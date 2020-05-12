<?php if(!$isLoggedIn): ?>
    <h3 style="text-align: center;">Register to TraveLog</h3>
    <br>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <label style="width: 26%;">Username:</label>
        <input class="popupTextBox" type="text" name="username">
        <br>
        <label style="width: 26%;">Email:</label>
        <input class="popupTextBox" type="text" name="email">
        <br>
        <label style="width: 26%;">Password:</label>
        <input class="popupTextBox" type="password" name="password">
        <br>
        <label style="width: 26%;">Confirm Password:</label>
        <input class="popupTextBox" type="password" name="password_confirm">
        <br>
        <br>
        <button type="submit" name="register" class="btn btn-primary">Register</button>
        <br>
        <div class="fb-login-button" data-size="large" data-button-type="login_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width="" onlogin="checkLoginState();"></div>
    </form>
<?php endif; ?>
