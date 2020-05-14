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

        <div class="PostSneakContainer">
            <?php
            //checks is button has been clicked
            if(isset($_GET['ViewPost'])){
                $PostID = $_GET['PostID'];
                //Selects all from posts where post id is same as the one clicked
                $sql = "SELECT PostID, PostTitle, PostBody, OwnerID FROM posts WHERE PostID=$PostID";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo '<div class="PostSneakBox">';
                        echo '<h2 id="PostSneakTitle">' . $row['PostTitle'];
                        echo '</h2>';
                        echo '<p id="PostSneakBody">' . $row['PostBody'];
                        echo '</p>';
                        echo '</div>';
                    }
                }
            }
            //if not clicked redirect
            else{
                header("Location: ../Form.php?failed");
                exit();
            }
            ?>
        </div>

    </div>
</body>
</html>