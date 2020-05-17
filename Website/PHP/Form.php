<?php
    //starts session and adds dbh.inc.php to file
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

        <div class="PostSneakContainerForm">
            <?php
                //Selects all posts from posts
                $sql = "SELECT PostID, PostTitle, PostBody, OwnerID FROM posts";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    //Checks if the amount of posts is more than 0
                    while($row = $result->fetch_assoc()){
                        //loops through them all and shows info
                        $PostBtn= $row['PostID'];
                        $SneakPeak = substr($row['PostBody'], 0, 300);
                        echo '<form action="ShowPost.php" method="get" class="PostSneakBox">';
                        echo '<h2 id="PostSneakTitle">' . $row['PostTitle'];
                        echo '</h2>';
                        echo '<p id="PostSneakBody">' . $SneakPeak;
                        echo '</p>';
                        echo '<input id="InputID" name="PostID" readonly value="'. $row['PostID'] .'">';
                        echo '<button type="submit" name="ViewPost" class="PostSneakView">View</button>';
                        echo '</form>';
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>