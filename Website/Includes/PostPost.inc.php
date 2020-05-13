<?php

    require 'dbh.inc.php';
    SESSION_START();


    if(isset($_POST['PublishBtn'])){
        $title = $_POST['Title'];
        $body = $_POST['Body'];
        $Active_uID = $_SESSION['userID'];

        $sql = "INSERT INTO posts (PostTitle, PostBody, OwnerID) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../PHP/MakePost.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ssi", $title, $body, $Active_uID);
            mysqli_stmt_execute($stmt);
            header("Location: ../PHP/Form.php?Post=success");
            exit();
        }
        mysqli_stmt_close($conn);
        mysqli_close($conn);
    }
    else{
        header('Location: ../PHP/MakePost.php');
        exit();
    }

?>