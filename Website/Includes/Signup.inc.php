<?php
//Adds DB to file
require 'dbh.inc.php';
//Checks if submit btn has been pressed.
if(isset($_POST['signup-submit'])){

    $username = $_POST['uid'];
    $Email = $_POST['mail'];
    $Pwd = $_POST['pwd'];
    $Pwd_Verify = $_POST['pwd-verify'];
    $UserRole = "User";

    //Checks if one or more field is empty
    //if true sends user back to signup page with info in url
    //terminates script
    if(empty($username) || empty($Email) || empty($Pwd) || empty($Pwd_Verify)){
        header("Location: ../PHP/Index.php?error=emptyfield&uid=".$username. "&mail=".$Email);
        //Terminates the script after this point if one field is empty.
        //Otherwise it will go on
        exit();
    }
    //Checks if email and username is valid
    //if not terminates script and redirects back to signup page
    elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL) && !preg_match('/^[a-zA-Z0-9]*$/', $username)){
        header("Location: ../PHP/Index.php?error=invalidmailuid");
        exit();
    }
    //checks if email is valid
    //if not terminates script and redirects user to signup page
    elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../PHP/Index.php?error=invalidmail&uid=".$username);
        exit();
    }
    //checks if username is valid
    //if not terminates script and redirects user to signup page
    elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../PHP/Index.php?error=invalidusername&mail=".$Email);
        exit();
    }
    //checks if passwords match
    //if not terminates script and redirects user to signup page
    elseif($Pwd !== $Pwd_Verify){
        header("Location: ../PHP/Index.php?error=passwordcheck&uid=".$username. "&mail=".$Email);
        exit();
    }
    //checks if username is already taken
    else{

        $sql = "SELECT UserName FROM users WHERE UserName=?;";
        //takes value entered into the form and checks if it is safe to use
        //by the mysqli_stms_prepare later
        //helps prevent sqli injection attacks
        $stmt = mysqli_stmt_init($conn);
        //if not safe redirects user
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../PHP/Index.php?error=sqlerror");
            exit();
        }
        //Defines what type of value is inputed and adds the user input
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            //Runs user info in DB
            mysqli_stmt_execute($stmt);
            //Takes result from DB and stores it in $stmt
            mysqli_stmt_store_result($stmt);
            //Checks amount of results from DB
            //Stores that value to $resultCheck
            //Either 0 or 1 is acceptable values
            //1 if there is a match
            //0 if no match was found
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if($resultCheck > 0){
                //if result is larger than 0
                //username is already taken
                //user redirected
                header("Location: ../PHP/Index.php?error=usernametaken&mail=".$Email );
                exit();
            }
            else{
                //inserts placeholders into tables
                //No values given by user inputed at this point
                $sql = "INSERT INTO users (UserName, UserEmail, UserPass, UserRole) VALUES (?,?,?,?);";
                //checks if values are safe
                $stmt = mysqli_stmt_init($conn);
                //if not redirects user
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../PHP/Index.php?error=sqlerror");
                    exit();
                }
                //else if safe to use
                else{
                    //Hashes Password using Bcrypt
                    $hashedPwd = password_hash($Pwd, PASSWORD_DEFAULT);
                    //Hashed password is the entered into the DB
                    //instead of the plaintext veriant
                    //inputs values as strings into the table specified above
                    mysqli_stmt_bind_param($stmt, "ssss", $username, $Email, $hashedPwd, $UserRole);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../PHP/Index.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
//If submit btn not pressed 
//redirect user
else{
    header("Location: ../PHP/Index.php?failed");
    exit();
}