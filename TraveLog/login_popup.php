<?php if(!$isLoggedIn): ?>
    <h3>Log In To TraveLog</h3>
    <br>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <label>Username:</label>
        <br>
        <input type="text" name="username">
        <br>
        <label>Password:</label>
        <br>
        <input type="password" name="password">
        <br>
        <button type="submit" name="login" class="btn btn-primary">Log In</button>
        <br>
        <div class="fb-login-button" data-size="large" data-button-type="login_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width="" onlogin="checkLoginState();"></div>
    </form>
<?php endif; ?>