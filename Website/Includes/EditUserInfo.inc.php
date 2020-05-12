<?php
    session_start();
    require '../Includes/dbh.inc.php';
    

    if(isset($_POST['SaveBtn'])){
        $uID = $_POST['uID'];
        $uName = $_POST['uName'];
        $uMail = $_POST['uMail'];
        $ActiveUserName = $_SESSION['ActiveUserName'];


        //Checks if one or more field is empty
        if(empty($uName) || empty($uMail)){
            header("Location: ../PHP/UserEdit.php");
            exit();
        }
        //Checks if email and username is valid
        //if not terminates script and redirects back to edit page
        elseif(!filter_var($uMail, FILTER_VALIDATE_EMAIL) && !preg_match('/^[a-zA-Z0-9]*$/', $uName)){
            header("Location: ../PHP/UserEdit.php");
            exit();
        }
        //checks if email is valid
        //if not terminates script and redirects user to edit page
        elseif(!filter_var($uMail, FILTER_VALIDATE_EMAIL)){
            header("Location: ../PHP/UserEdit.php?error=invalidemail");
            exit();
        }
        //checks if username is valid
        //if not terminates script and redirects user to edit page
        elseif(!preg_match('/^[a-zA-Z0-9]*$/', $uName)){
            header("Location: ../PHP/UserEdit.php");
            exit();
        }
        else{
            if($uName != $ActiveUserName){
                $sql = "SELECT UserName FROM users WHERE UserName=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../PHP/UserEdit.php?error=sqlError1");
                exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt, "s", $uName);
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
                        header('Location: ../PHP/UserEdit.php?error=usernametaken');
                        exit();
                    }
                    else{
                        $sql = "UPDATE users SET UserName='$uName', UserEmail='$uMail' WHERE UserID='$uID'";
                        if(mysqli_query($conn,$sql)){
                            echo "Record updated successfully";
                            header("Location: ../PHP/UserEdit.php?success=updated1");
                            exit();
                        }
                        else{
                            echo "Error updating record: " . mysqli_error($conn);
                        }
                    }
                }
            }
            else{
                $sql = "UPDATE users SET UserName='$uName', UserEmail='$uMail' WHERE UserID='$uID'";
                if(mysqli_query($conn,$sql)){
                    echo "Record updated successfully";
                    header("Location: ../PHP/UserEdit.php?success=updated2");
                    exit();
                }
                else{
                    echo "Error updating record: " . mysqli_error($conn);
                }
            }
        }
    }
    else{
        header("Location: ../PHP/UserEdit.php?failed");
        exit();
    }
?>