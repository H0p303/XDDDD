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
    <title>XDDDDDD</title>
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
            if(isset($_SESSION['userID'])){
                //checks user role
                //if user role admin
                if($_SESSION['userRole'] == 'Admin'){
                    echo '
                    <div class="EditUser">
                        <a href="EditUser.php">Edit User</a>
                    </div>
                    <div class="EditUserAdmin">
                        <a href="EditUserAdmin.php">Edit UserRole</a>
                    </div>
                    <div class="MakePost">
                        <a href="MakePost.php">Make Post</a>
                    </div>';
                }
                elseif($_SESSION['userRole'] == 'User'){
                    //if user role user
                    echo '
                    <div class="EditUser">
                        <a href="EditUser.php">Edit User</a>
                    </div>
                    <div class="MakePost">
                        <a href="MakePost.php">Make Post</a>
                    </div>';
                }
            }
        ?>

        

        
    </div>

</body>
</html>