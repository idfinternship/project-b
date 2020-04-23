<?php 
    require('config/config.php');
    require('config/db.php');
    require("login_session.php");
    
    

    $msg = '';
    $msgClass = '';

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
                        if($user['active'] == 1){
                            $msg = "Success!";
                            $msgClass = 'alert-success';
                            $_SESSION['isLoggedIn'] = true;
                            $_SESSION['userID'] = $user['id'];
                            header('Location: '. ROOT_URL .'index.php');
                        }
                        else{
                            $msg = "Account is not verified. Please check your email: ".$user['email'];
                            $msgClass = 'alert-danger';
                        }
                        
                    }
                    else{
                        $msg = 'Wrong username or password';
                        $msgClass = 'alert-danger';
                    }
                }
                else{
                    $msg = 'Wrong username or password';
                    $msgClass = 'alert-danger';
                }
            }
            else{
                $msg = 'Please enter all fields';
                $msgClass = 'alert-danger';
            }
        }
    }
    else{
        $msg = "You are already logged in!";
        $msgClass = 'alert-warning';
    }
    mysqli_close($conn);
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Log In Page</title>
    <?php require('style.php'); ?>
</head>
<body>
    <script>
              window.fbAsyncInit = function() {
                FB.init({
                  appId      : '558173124816363',
                  cookie     : true,
                  xfbml      : true,
                  version    : 'v6.0'
                });
                  
                FB.AppEvents.logPageView();   
                  
              };

              (function(d, s, id){
                 var js, fjs = d.getElementsByTagName(s)[0];
                 if (d.getElementById(id)) {return;}
                 js = d.createElement(s); js.id = id;
                 js.src = "https://connect.facebook.net/en_US/sdk.js";
                 fjs.parentNode.insertBefore(js, fjs);
               }(document, 'script', 'facebook-jssdk'));

                FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                });
            </script>
    
    <?php require('navbar.php'); ?>
    <?php if(!$isLoggedIn): ?>
        <div class="container">
            <form method="POST" action="">
                <label>Username:</label>
                <input type="text" name="username">
                <br>
                <label>Password:</label>
                <input type="password" name="password">
                <br>
                <button type="submit" name="login" class="btn btn-primary">Log In</button>
            </form>

            
        </div>
    <?php endif; ?>
</body>
</html>