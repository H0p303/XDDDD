<?php
    session_start();
    require '../Includes/dbh.inc.php';
        //checks if button was pressed
        if(isset($_POST['submit'])){
            $uID = $_POST['Admin_uID'];
            $uRole = $_POST['Admin_uRole'];

            $sql = "UPDATE users SET UserRole='$uRole' WHERE UserID='$uID'";
            echo $uID . '<br>' . $uRole . '<br>';
            //Updates values
            if (mysqli_query($conn, $sql)) {
                 echo "Record updated successfully";
                 header("Location: ../PHP/Admin.php?success=updated");
                 exit();
    
                 } else {
                 echo "Error updating record: " . mysqli_error($conn);
                 }
        }
        //if not redirect
        else{
            header('Location: ../PHP/Admin.php');
            exit();
        }

    ?>