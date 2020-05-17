<?php

    SESSION_START();
    require 'dbh.inc.php';
    //Checks if delete button was pressed
    if(isset($_GET['Delete'])){

        $CommentID = $_GET['CommentID'];
        $sql = "DELETE FROM comments WHERE commentID=$CommentID";
        //Deletes comment with selected ID
        if($conn->query($sql) === TRUE){
            echo "Record deleted successfully";
            header('Location: ../PHP/Form.php?successfullyDeleted');
            exit();
        }
        else{
            echo "Error deleting record: " . $conn->error;
        }
    }

?>