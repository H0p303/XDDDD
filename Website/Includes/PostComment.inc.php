<?php

    SESSION_START();
    require 'dbh.inc.php';
    //If CommmentBtn is pressed do this
    if(isset($_POST['CommentBtn'])){
        $body = $_POST['Body'];
        $ActiveUID = $_SESSION['userID'];
        $PostConnID = $_POST['PostConnID'];

        $sql = "INSERT INTO comments (commentBody, OwnerID, PostConnID) VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        //inserts value placeholders in DB to check if it is safe.
        //If not safe redirect
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../PHP/Form.php?error=sqlerror");
            exit();
        }
        //else insert into DB
        else{
            mysqli_stmt_bind_param($stmt, "sii", $body, $ActiveUID, $PostConnID);
            mysqli_stmt_execute($stmt);
            header("Location: ../PHP/Form.php?Post=success");
            exit();
        }
        mysqli_stmt_close($conn);
        mysqli_close($conn);
    }
    //else redirect
    else{
        header('Location: ../PHP/Form.php');
        exit();
    }

?>