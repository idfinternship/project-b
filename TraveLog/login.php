<?php 
    require('config/config.php');
    require('config/db.php');
    require("login_session.php");
    
    

    $msg = '';

    if(!$isLoggedIn){
        if(isset($_POST['login'])){
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            if(!empty($username) && !empty($password)){
                $query = "SELECT * FROM users WHERE username = '$username'";

                $result = mysqli_query($conn, $query);
                $user = mysqli_fetch_assoc($result);

                if($user != false){
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);
                    if(password_verify($password, $user['password'])){
                        $msg = "Success!";
                        $_SESSION['isLoggedIn'] = true;
                        $_SESSION['user'] = $user;
                        header('Location: '. ROOT_URL .'');
                    }
                    else{
                        $msg = 'Wrong username or password';
                    }
                }
                else{
                    $msg = 'Wrong username or password';
                }


                mysqli_free_result($result);
                mysqli_close($conn);
            }
        }
    }
    else{
        $msg = "You are already logged in!";
    }
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Log In Page</title>
    <?php require('style.php'); ?>
</head>
<body>
    <?php require('navbar.php'); ?>
    <?php if($msg != ''){
            echo $msg;
        } ?>
    <?php if(!$isLoggedIn): ?>
        <div class="container">
            <form method="POST" action="" class="form-control">
                <label>Username:</label>
                <input type="text" name="username">
                <br>
                <label>Password:</label>
                <input type="password" name="password">
                <br>
                <button type="submit" name="login">Log In</button>
            </form>
        </div>
    <?php endif; ?>
</body>
</html>