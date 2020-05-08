<?php
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
                            $_SESSION['isFB'] = false;
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
?>