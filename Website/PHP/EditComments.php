<?php
    SESSION_START();
    require '../Includes/dbh.inc.php';
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
            //checks if user is logged in
            
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
            if(isset($_GET['Edit'])){
                $CommentID  = $_GET["CommentID"];
                //Selects all from users where user id is same as session id
                $sql = "SELECT commentID, commentBody, PostConnID, OwnerID FROM comments WHERE commentID=$CommentID";
                $result = $conn -> query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo '<div class="UserEditCommentBox">';
                        //Sends to PostPost.inc.php where post is added to DB
                        echo '<form method="post" action="../Includes/EditComment.inc.php">';
                        echo '<input name="CommentID" id="PostID" value="' . $CommentID .'">';
                        echo '<input required type="text" readonly name="Title" Value="OwnerID: ' . $row{'OwnerID'} . '">';
                        echo '<textarea required type="text" name="Body">';
                        echo $row["commentBody"];
                        echo '</textarea>';
                        echo '<button type="submit" name="Edit">Edit</button>';
                        echo '<button name="Delete" type="submit">Delete Comment</button>';
                        echo '</form></div>';
                    }
                }else{
                    echo '0 results';
                }
            }
        ?>
    </div>

</body>
</html>