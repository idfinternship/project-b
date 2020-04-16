<?php 
    require('config/config.php');
    require('config/db.php');
    require("login_session.php");
    

    $msg = '';
    $msgClass = '';

    if(!$isLoggedIn){
        if(isset($_POST['register'])){
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $password_confirm = htmlspecialchars($_POST['password_confirm']);
            if(!empty($username) && !empty($email) && !empty($password) && !empty($password_confirm)){

                if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                    $msg = 'Please enter a valid email';
                    $msgClass = 'alert-danger';
                }
                else{
                    if(strlen($password) < 6 || strlen($password) > 255){
                        $msg = 'Password must be between 6 and 255 characters';
                        $msgClass = 'alert-danger';
                    }
                    else{
                        if($password != $password_confirm){
                            $msg = 'Passwords must match';
                            $msgClass = 'alert-danger';
                        }
                        else
                        {
                            $uquery = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
                            $equery = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                            if(!mysqli_fetch_assoc($equery) && !mysqli_fetch_assoc($uquery)){
                                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                                $verification_hash = md5(rand(0, 10000));
                                $query = "INSERT INTO users(username, password, email, verification_hash) VALUES('$username', '$password_hash', '$email', '$verification_hash')";
                                
                                if(mysqli_query($conn, $query)){
                                    require('mail.php');
                                    if (PEAR::isError($mail)) {
                                        $msg = $mail->getMessage();
                                        $msgClass = 'alert-danger';
                                    } else {
                                        $msg = 'Registered! Check your email to verify your account.';
                                        $msgClass = 'alert-success';
                                    }
                                    
                                } else {
                                    $msg = 'ERROR: '. mysqli_error($conn);
                                    $msgClass = 'alert-danger';
                                }
                            }
                            else{
                                $msg = 'Username or email already exists';
                                $msgClass = 'alert-danger';
                            }
                        }
                    }
                }
            }
            else{
                $msg = 'Please fill in all fields';
                $msgClass = 'alert-danger';
            }

        }
    }else{
        $msg = "You are already logged in!";
        $msgClass = 'alert-warning';
    }
    mysqli_close($conn);
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <?php require('style.php'); ?>
</head>
<body>
    
    <div class="container">
        <?php if($msg != ''): ?>
            <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
        <?php endif; ?>
    </div>
    <?php require('navbar.php'); ?>
    <div class="container">
    <?php if(!$isLoggedIn): ?>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <label>Username:</label>
            <input type="text" name="username">
            <br>
            <label>Email:</label>
            <input type="text" name="email">
            <br>
            <label>Password:</label>
            <input type="password" name="password">
            <br>
            <label>Confirm Password:</label>
            <input type="password" name="password_confirm">
            <br>
            <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>
    <?php endif; ?>
    </div>
</body>
</html>