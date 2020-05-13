<?php
    session_start();
    require '../Includes/dbh.inc.php';
    if ($_SESSION['userRole'] !== 'Admin') {
        header("Location: ./index.php");
        exit();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Style/Index.css">
</head>
<body>
    
<div class="Main">
<?php

if(isset($_SESSION['userID'])){
    echo '<header>
<div class="navBar">
    <ul>
        <li id="Title"><a href="Index.php">XDDDD</a></li>
        <li><a href="Index.php">Home</a></>
        <li><a href="Form.php">Form</a></li>
        <li><a href="../Includes/Logout.inc.php">Logout</a></li>
    </ul>
</div>
</header>
<div class="MainContainer">
<p></p>
</div>';
}
else{
    echo '<header>
    <div class="navBar">
        <ul>
            <li id="Title"><a href="#">XDDDD</a></li>
            <li><a href="Index.php">Home</a></>
            <li><a href="Signup.php">Signup</a></li>
            <li><a href="Login.php">Login</a></li>
        </ul>
    </div>
</header>
<div class="MainContainer">
<p></p>
</div>';
}
?>
    <div class='UserEditList'>
        <?php

        $sql = "SELECT UserID, UserName, UserEmail, UserRole FROM users";
        $result = $conn -> query($sql);
        if ($result -> num_rows > 0){
            while($row = $result -> fetch_assoc()){
                echo '<form action="../Includes/EditUserInfoAdmin.inc.php" method="post">';
                        echo '<div class="tooltip"><input type="text" name="uID" readonly required value="' . $row['UserID'] . '"><span class="tooltiptext">UserID</span></div>';
                        echo '<div class="tooltip"><input type="text" name="uRole" required value="' . $row['UserRole'] . '"><span class="tooltiptext">Enter User Or Admin</span></div>';
                        echo '<div class="tooltip"><input type="text" name="uName" readonly required value="' . $row['UserName'] . '"><span class="tooltiptext">Enter Username</span></div>';
                        echo '<div class="tooltip"><input type="text" name="uMail" readonly required value="' . $row['UserEmail'] . '"><span class="tooltiptext">Enter Email</span></div>';
                        echo '<button type="submit" name="submit">Save Changes</button>';
                        echo '</form>';
            }
        }
        ?>
    </div>
</div>
</body>
</html>