<?php if(!$isLoggedIn): ?>
    <h3>Register To TraveLog</h3>
    <br>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <label>Username:</label>
        <input type="text" name="username">
        <br>
        <label>Email:</label>
        <input type="text" name="email">
        <br>
        <label>Password:</label>
        <br>
        <input type="password" name="password">
        <br>
        <label>Confirm Password:</label>
        <br>
        <input type="password" name="password_confirm">
        <br>
        <button type="submit" name="register" class="btn btn-primary">Register</button>
        <br>
        <div class="fb-login-button" data-size="large" data-button-type="login_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width="" onlogin="checkLoginState();"></div>
    </form>
<?php endif; ?>