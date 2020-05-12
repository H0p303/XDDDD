<?php
    session_start();
    require '../Includes/dbh.inc.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/UserEdit.css">
    <title>Document</title>
</head>
<body>
    
    <?php
        $uID = $_SESSION["userID"];
        $sql = "SELECT UserID, UserName, UserEmail, UserRole FROM users WHERE UserID=$uID";
        $result = $conn -> query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()){
                echo '<form action="../Includes/EditUserInfo.inc.php" method="post">';
                    echo '<input type="text" name="uID" readonly required value="' . $row["UserID"] . '">';
                    echo '<input type="text" name="uName" required value="' . $row["UserName"] . '">';
                    echo '<input type="text" name="uMail" required value="' . $row["UserEmail"] . '">';
                    echo '<input type="text" name="uRole" readonly value="' . $row["UserRole"] . '">';
                    echo '<button type="submit" name="SaveBtn">Save</button>';
                echo '</form>';
            }
          } else {
            echo "0 results";
          }
    ?>

          <a href="../PHP/Index.php">Back</a>

</body>
</html>