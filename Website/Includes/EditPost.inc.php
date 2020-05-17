<?php

    SESSION_START();
    require 'dbh.inc.php';

    $PostTitle = $_POST['Title'];
    $PostBody = $_POST['Body'];
    $PostID = $_POST['PostID'];

    //If EditBtn is pressed update posts
    if(isset($_POST['EditBtn'])){
        $sql = "UPDATE posts SET PostTitle='$PostTitle', PostBody='$PostBody' WHERE PostID='$PostID'";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../PHP/EditPost.php?error=sqlerror");
            exit();
        }
        //else inserts values into posts.
        else{
            mysqli_stmt_bind_param($stmt, "ss", $PostTitle, $PostBody);
            mysqli_stmt_execute($stmt);
            header("Location: ../PHP/Index.php?Post=success");
            exit();
        }
        mysqli_stmt_close($conn);
        mysqli_close($conn);
    }
    //else if DeletePost is pressed delete post
    elseif(isset($_POST["DeletePost"])){
        $postID = $_POST['PostID'];
        $sql = "DELETE FROM posts WHERE PostID=$postID";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
            header('Location: ../PHP/EditPostAdmin.php?success');
            exit();
        } 
        else {
            echo "Error deleting record: " . $conn->error;
        }
    }
    //else redirect
    else{
        header("Location: ../PHP/EditPostAdmin.php?test");
        exit();
    }
    
?>