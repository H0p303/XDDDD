<?php
    session_start();
    require '../Includes/dbh.inc.php';

        if(isset($_POST['submit'])){
            $uID = $_POST['Admin_uID'];
            $uRole = $_POST['Admin_uRole'];

            $sql = "UPDATE users SET UserRole='$uRole' WHERE UserID='$uID'";
            echo $uID . '<br>' . $uRole . '<br>';

            if (mysqli_query($conn, $sql)) {
                 echo "Record updated successfully";
                 header("Location: ../PHP/Admin.php?success=updated");
                 exit();
    
                 } else {
                 echo "Error updating record: " . mysqli_error($conn);
                 }
        }

    ?>