<?php
    session_start();
    require '../Includes/dbh.inc.php';
    //checks if button was pressed
    if(isset($_POST['submit'])){
        $uID = $_POST['uID'];
        $uRole = $_POST['uRole'];
        
        switch($uRole){
            //checks userRole value
            case 'Admin':
                $sql = "UPDATE users SET UserRole='$uRole' WHERE UserID='$uID'";
                        echo $uID . '<br>' . $uRole . '<br>';
                        //updates values
                        if (mysqli_query($conn, $sql)) {
                            echo "Record updated successfully";
                            header("Location: ../PHP/EditUserAdmin.php?success=updated");
                            exit();

                        } 
                        else {
                            echo "Error updating record: " . mysqli_error($conn);
                        }
                break;
            case 'User':
                $sql = "UPDATE users SET UserRole='$uRole' WHERE UserID='$uID'";
                        echo $uID . '<br>' . $uRole . '<br>';
                        //updates values
                        if (mysqli_query($conn, $sql)) {
                            echo "Record updated successfully";
                            header("Location: ../PHP/EditUserAdmin.php?success=updated");
                            exit();

                        } 
                        else {
                            echo "Error updating record: " . mysqli_error($conn);
                        }
                break;
            default:
                header("Location: ../PHP/EditUserAdmin.php?error=InvalidUserRole");
                exit();
                break;
        }

        
    }
    //if not redirect
    else{
        header('Location: ../PHP/EditUserAdmin.php');
        exit();
    }
?>