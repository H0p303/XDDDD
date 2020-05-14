<?php
    require '../Includes/dbh.inc.php';
    SESSION_START();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/Index.css">
    <title>XDDDD</title>
</head>
<body>
    <div class="Main">
        <?php
            //Checks if user is logged in
            //displays different layout depending on result
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

        <?php
            $uID  = $_SESSION["userID"];
            //Selects all from users where user id is same as session id
            $sql = "SELECT UserID, UserName, UserEmail, UserRole FROM users WHERE UserID=$uID";
            $result = $conn -> query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo '<div class="UserPublishPost">';
                    //Sends to PostPost.inc.php where post is added to DB
                    echo '<form method="post" action="../Includes/PostPost.inc.php">';
                    echo '<input required type="text" name="Title" placeholder="Enter Title">';
                    echo '<textarea required type="text" name="Body" placeholder="Enter Body"></textarea>';
                    echo '<button type="submit" name="PublishBtn">Publish</button>';
                    echo '</form></div>';
                }
            }else{
                echo '0 results';
            }
        ?>
    </div>
</body>
</html>