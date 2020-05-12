<?php

    require '../Includes/dbh.inc.php';
    SESSION_START();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/PostPostStyle.css">
    <title>Document</title>
</head>
<body>
    <?php
        $uID  = $_SESSION["userID"];
        $sql = "SELECT UserID, UserName, UserEmail, UserRole FROM users WHERE UserID=$uID";
        $result = $conn -> query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo '<form method="post" action="../Includes/PostPost.inc.php">';
                echo '<input type="text" name="Title" placeholder="Enter Title">';
                echo '<input type="text" name="Body" placeholder="Enter Body">';
                echo '<button type="submit" name="PublishBtn">Publish</button>';
                echo '</form>';
            }
        }else{
            echo '0 results';
        }
    ?>
</body>
</html>