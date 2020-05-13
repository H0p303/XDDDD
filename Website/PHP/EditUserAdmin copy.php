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
            echo "<form method='post' action='../Includes/EditUserInfo.inc.php'>";

                    echo '<input type="text" name="Admin_uID" readonly required value="' . $row["UserID"] . '">';
                    echo '<input type="text" name="Admin_uName" readonly required value="' . $row["UserName"] . '">';
                    echo '<input type="text" name="Admin_uMail" readonly required value="' . $row["UserEmail"] . '">';
                    echo '<select name="Admin_uRole">';
                    switch ($row['UserRole']) {
                        case 'Admin':
                            echo'
                            <option value="User">[User]</option>
                            <option value="Admin" selected="selected">[Admin]</option>
                            ';
                            break;
                        case 'User':
                            echo'
                            <option value="User" selected>[User]</option>
                            <option value="Admin">[Admin]</option>
                            ';
                            break;
                        
                        default:
                            echo'
                            <option value="User" selected>[User]</option>
                            <option value="Admin">[Admin]</option>
                            ';
                            break;
                    }
                        echo "</select>" . "<button type='submit' name='submit'>Save</button>" . "</form>";
                    }

        }

    ?>
    </div>
</div>
</body>
</html>