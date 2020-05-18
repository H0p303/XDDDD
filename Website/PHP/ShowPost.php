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
        <div class="PostCommentContainer">

            <?php
                if($_SESSION['userRole'] == 'Admin'){
                    //Shows all comment with selected post id
                    $PostID = $_GET['PostID'];
                    $sql = "SELECT commentID, commentBody, OwnerID FROM comments WHERE PostConnID=$PostID";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            echo '<form class="CommentBox" action="EditComments.php" method="get">';
                            echo '<h3>UserID ' . $row['OwnerID'];
                            echo '</h3>';
                            echo '<input id="CommentID" name="CommentID" value="'. $row['commentID'] .'">';
                            echo '<textarea readonly id="CommentBody">';
                            echo $row['commentBody'];
                            echo '</textarea>';
                            echo '<button name="Edit" id="CommentEditBtn">Edit Comment</button>';
                            echo '</form>';
                        }
                    }
                }
                elseif($_SESSION['userRole'] == 'User'){
                    //Shows all comment with selected post id
                    $PostID = $_GET['PostID'];
                    $UserID = $_SESSION['userID'];
                    $sql = "SELECT commentID, commentBody, OwnerID FROM comments WHERE PostConnID=$PostID AND OwnerID=$UserID";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            echo '<form class="CommentBox" action="EditComments.php" method="get">';
                            echo '<h3>UserID ' . $row['OwnerID'];
                            echo '</h3>';
                            echo '<input id="CommentID" name="CommentID" value="'. $row['commentID'] .'">';
                            echo '<textarea readonly id="CommentBody">';
                            echo $row['commentBody'];
                            echo '</textarea>';
                            echo '<button name="Edit" id="CommentEditBtn">Edit Comment</button>';
                            echo '</form>';
                        }
                    }
                }
                
                
            ?>
            <?php
                //Connects comment to post via PostID
                //Results in comment only showing for specific post
                $PostID = $_GET['PostID'];
                $sql = "SELECT PostID FROM posts WHERE PostID=$PostID";
                $result = $conn->query($sql);
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                        echo "<form action='../Includes/PostComment.inc.php' method='post'>";
                        echo '<input id="PostID" name="PostConnID" value="' . $row['PostID'] . '">';
                        echo '<textarea type="text" name="Body" id="commentBody"></textarea>';
                        echo '<button name="CommentBtn" id="CommentBtn" type="submit">Post Comment</button>';
                        echo '</form>';
                    }
                }
            ?>
        </div>



    </div>
</body>
</html>