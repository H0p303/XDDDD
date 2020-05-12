<?php

require 'dbh.inc.php';
//checks if login submit btn has been pressed
if(isset($_POST['Login-Submit'])){
 
    $mailuid = $_POST['mailuid'];
    $Pwd = $_POST['pwd'];

    //checks if either field is empty and redirects if necessary
    if(empty($mailuid) || empty($Pwd)){
        header("Location: ../PHP/Index.php?error=emptyfields");
        exit();
    }
    //if both fields are filled check if they match 
    //value in DB
    else{
        //selects all from users and uses a prepared statment
        //in order to help prevent sql injection attacks
        $sql = "SELECT * FROM users WHERE UserName=? OR UserEmail=?;";
        $stmt = mysqli_stmt_init($conn);
        //if not safe redirect
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../PHP/Index.php?error=sqlerror");
            exit();
        }
        //else check DB for results
        else{
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            //unhashes the PWD stored in DB and compares it to the user entered PWD
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($Pwd, $row['UserPass']);
                //if no match redirect user
                if($pwdCheck == false){
                    header("Location: ../PHP/Index.php?error=wrongpwd1");
                    exit();
                }
                //if match login user
                elseif($pwdCheck == true){
                    session_start();
                    $_SESSION['userID'] = $row['UserID'];
                    $_SESSION['ActiveUserName'] = $row['UserName'];
                    $_SESSION['userRole'] = $row['UserRole'];

                    header("Location: ../PHP/Index.php?Success");
                    exit();
                }
                else{
                    header("Location: ../PHP/Index.php?error=wrongpwd2");
                    exit();
                }
            }
            //if username or email doesnt exist 
            //redirect user and show nouser errormsg
            else{
                header("Location: ../PHP/Index.php?error=nouser");
                exit();
            }
        }
    }

}
//if submit btn has not been pressed redirect user
else{
    header("Location: ../PHP/Index.php?test");
    exit();
}
