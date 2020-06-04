<?php 
    require('config/config.php');
    require('config/db.php');
    require("login_session.php");
    

    $msg = '';
    $msgClass = '';


    if(!$isLoggedIn){
        if(isset($_POST['register'])){
            $username = htmlspecialchars($_POST['username']);
            if(!empty($username)){
                $uquery = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
                if(!mysqli_fetch_assoc($uquery)){
                    $q = $_SESSION['q'];
                    $query = "INSERT INTO users(username, fb_id, fb_linked, active) VALUES('$username', '$q', '1', '1')";
                    if(mysqli_query($conn, $query)){
                        $msg = 'Registered!';
                        $msgClass = 'alert-success';
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
            else{
                $msg = 'Please fill in all fields';
                $msgClass = 'alert-danger';
            }

        }
    }else{
        $msg = "You are already logged in!";
        $msgClass = 'alert-warning';
        header('Location: '. ROOT_URL .'index.php');
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
    <script src="js/fb.js"></script>
    <div class="container">
        <?php if($msg != ''): ?>
            <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
        <?php endif; ?>
    </div>
    <?php require('navbar.php'); ?>
    <div class="container">
    <?php if(!$isLoggedIn): ?>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-control">
            <label>Username:</label>
            <input type="text" name="username" class="popupTextBox">
            <br>
            <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>
    <?php endif; ?>
    </div>
    <div id="myModalL" class="modal">
      <div class="modal-content">
        <div class="mdl-layout-spacer"><span class="close" id="modalClose1">&times;</span></div>
        <?php require("login_popup.php"); ?>
      </div>
    </div>

    <div id="myModalR" class="modal">
      <div class="modal-content">
        <div class="mdl-layout-spacer"><span class="close" id="modalClose2">&times;</span></div>
        <?php require("register_popup.php"); ?>
      </div>
    </div>

    <script src="js/modal.js"></script>
</body>
</html>