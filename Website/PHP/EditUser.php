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
        
            $uID = $_SESSION["userID"];
            //Selects all info from users where userID is match with session id
            $sql = "SELECT UserID, UserName, UserEmail, UserRole FROM users WHERE UserID=$uID";
            $result = $conn -> query($sql);
            //If user role is admin
            //shows different layout depending on result
            if($_SESSION['userRole'] == 'Admin'){
                if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo '<div class="UserEditList">';
                    //sends info to edituser.inc.php where stuff is done
                    echo '<form action="../Includes/EditUserInfo.inc.php" method="post">';
                    echo '<div class="tooltip"><input type="text" name="uID" readonly required value="' . $row['UserID'] . '"><span class="tooltiptext">UserID</span></div>';
                    echo '<div class="tooltip"><input type="text" name="uRole" readonly required value="' . $row['UserRole'] . '"><span class="tooltiptext">Enter User Or Admin</span></div>';
                    echo '<div class="tooltip"><input type="text" name="uName" required value="' . $row['UserName'] . '"><span class="tooltiptext">Enter Username</span></div>';
                    echo '<div class="tooltip"><input type="text" name="uMail" required value="' . $row['UserEmail'] . '"><span class="tooltiptext">Enter Email</span></div>';
                    echo '<button id="RemoveUser" name="RemoveUserBtn">Delete Account</button>';
                    echo '<button type="submit" name="SaveBtn">Save Changes</button>';
                    echo '</form></div>';
                    }
                }
            }
            elseif($_SESSION['userRole'] == 'User'){
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo '<div class="UserEditList">';
                        //sends info to edituser.inc.php where stuff is done
                        echo '<form action="../Includes/EditUserInfo.inc.php" method="post">';
                        echo '<div class="tooltip"><input type="text" name="uID" readonly required value="' . $row['UserID'] . '"><span class="tooltiptext">UserID</span></div>';
                        echo '<div class="tooltip"><input type="text" name="uRole" readonly required value="' . $row['UserRole'] . '"><span class="tooltiptext">Enter User Or Admin</span></div>';
                        echo '<div class="tooltip"><input type="text" name="uName" required value="' . $row['UserName'] . '"><span class="tooltiptext">Enter Username</span></div>';
                        echo '<div class="tooltip"><input type="text" name="uMail" required value="' . $row['UserEmail'] . '"><span class="tooltiptext">Enter Email</span></div>';
                        echo '<button id="RemoveUser" name="RemoveUserBtn">Delete Account</button>';
                        echo '<button type="submit" name="SaveBtn">Save Changes</button>';
                        echo '</form></div>';
                        }
                    }
            }
        
        ?>
        

    </div>
</body>
</html>