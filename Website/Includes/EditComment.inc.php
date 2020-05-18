<?php
    require 'dbh.inc.php';
    //Checks if delete button was pressed

    $CommentBody = $_POST['Body'];
    $CommentID = $_POST['CommentID'];

    if(isset($_POST['Delete'])){

        $CommentID = $_POST['CommentID'];
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
    elseif(isset($_POST['Edit'])){
        $sql = "UPDATE comments SET commentBody='$CommentBody' WHERE commentID='$CommentID'";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../PHP/Form.php?error=sqlerror");
            exit();
        }
        //else inserts values into posts.
        else{
            mysqli_stmt_bind_param($stmt, "s", $CommentBody);
            mysqli_stmt_execute($stmt);
            header("Location: ../PHP/Form.php?Update=success");
            exit();
        }
        mysqli_stmt_close($conn);
        mysqli_close($conn);
    }
    else{
        header('Location: ../PHP/Form.php');
        exit();
    }

?>