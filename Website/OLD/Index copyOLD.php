<?php
    session_start();
    require '../Includes/dbh.inc.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/MainStyle.css">
    <title>Document</title>
</head>
<body>
    
<div class="Main-Container">

    <?php
        if(isset($_SESSION['userID'])){
            if($_SESSION['userRole'] == 'Admin'){
                echo'
                <aside>
                    <nav>
                        <a href="PostPost.php"><img src="../Resources/Images/Pen_64x64.png" alt=""></a>
                        <a href="UserEdit.php"><img src="../Resources/Images/User_64x64.png" alt=""></a>
                        <a href="Admin.php"><img src="../Resources/Images/Cog_64x64.png" alt=""></a>
                    </nav>
                </aside>';
            }
            else if($_SESSION['userRole'] == 'User'){
                echo'<aside>
                <nav>
                    <a href="MainPage.php"><img src="../Resources/Images/Pen_64x64.png" alt=""></a>
                    <a href="UserEdit.php"><img src="../Resources/Images/User_64x64.png" alt=""></a>
                </nav>
            </aside>';
            }
        }
        else{
            echo'<aside>
            <nav>
                <a href="MainPage.php"><img src="../Resources/Images/Pen_64x64.png" alt=""></a>
                <a href="#"><img src="../Resources/Images/User_64x64.png" alt=""></a>
            </nav>
        </aside>';
        }
    ?>

    <header>
        <?php
        if(isset($_SESSION['userID'])){
            echo'<form action="../Includes/Logout.inc.php" method="post">
                <button class="open-button" type="submit">Logout</button>
            </form>';
        }
        else{
            echo'<button class="open-button" onclick="OpenCloseForm()">Login</button>';
        }
        
        ?>
    </header>
    <?php
        $sql = "SELECT PostID, PostTitle, PostBody, OwnerID FROM posts";
        $result = $conn ->query($sql);
        $CardNum = 0;
        $TitleCardNum = 0;
        $Js_Section = 0;
        if($result ->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $CardNum++;
                $TitleCardNum++;
                $Js_Section++;
                $SneakPeak = substr($row['PostBody'], 0, 300);
                if(isset($_SESSION['userID'])){
                    echo '<section onclick="Section' . $Js_Section . '()" id="Card' . $CardNum . '">';
                    echo '<h2 class="TitleCard" id="TitleCard' . $TitleCardNum .'">' . $row['PostTitle'];
                    echo '</h2>';
                    echo "<p class='PCard'>$SneakPeak";
                    echo '</p>';
                    echo '</section>';
                }
                else{
                    echo'<section id="Card1">
                    <h2 class="TitleCard" id="TitleCard1"></h2>
                    <p class="PCard">
                    </p>
                </section>';
                }
            }
        }
        
    ?>
    <main>
    <div class="form-popup" id="myLoginForm">
      <form action="../Includes/Login.inc.php" class="form-container" method="post">
        <h1>Login</h1>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="mailuid" required/>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pwd" required/>
        <button type="submit" class="btn" name="Login-Submit">Login</button>
        <button type="button" class="btn" onclick="OpenFormType()">Sign Up</button>
      </form>
    </div>

    <div class="form-popup" id="mySignupForm">
        <form method="post" class="form-container" action="../Includes/Signup.inc.php">
            <h1>Sign Up</h1>
            <input id="UserInput" type="text" placeholder="Username" name="uid" required>
            <input id="EmailInput" type="text" placeholder="Email" name="mail" required>
            <input id="PassInput" type="password" placeholder="Password" name="pwd" required>
            <input id="VerPassInput" type="password" placeholder="Re-type Password" name="pwd-verify" required>
            <button type="submit" name="signup-submit" class="btn">Sign Up</button>
            <button type="button" class="btn" onclick="OpenFormType()">Login</button>
        </form>
    </div>

        <?php
            $sql = "SELECT PostID, PostTitle, PostBody, OwnerID FROM posts";
            $result = $conn->query($sql);
            $SectionNum = 0;
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $SectionNum++;
                    if(isset($_SESSION['userID'])){
                        echo'<Div class="MainContent" id="Content'. $SectionNum .'">
                        <h1>'. $row['PostTitle'] .'</h1>
                        <p>'. $row['PostBody'] .'</p>
                    </Div>';
                    }
                    else{
                        echo'<Div class="MainContent" id="Content1">
                        <h1></h1>
                        <p></p>
                    </Div>';
                    }
                }
            }
        ?>

    </main>
</div>
    
<script src="../JS/Script.js"></script>

</body>
</html>