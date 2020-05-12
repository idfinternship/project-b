<?php if(!$isLoggedIn): ?>
    <h3 style="text-align: center;">Log In to TraveLog</h3>
    <br>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <label style="width: 26%;">Username:</label>
        <input class="popupTextBox" type="text" name="username">
        <br>
        <label style="width: 26%;">Password:</label>
        <input class="popupTextBox" type="password" name="password">
        <br>
        <br>
        <button type="submit" name="login" class="btn btn-primary">Log In</button>
        <br>
        <div class="fb-login-button" data-size="large" data-button-type="login_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width="" onlogin="checkLoginState();"></div>
    </form>
<?php endif; ?>
