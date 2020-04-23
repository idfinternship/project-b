<?php if(!$isLoggedIn): ?>
    <h3>Log In To TraveLog</h3>
    <br>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <label>Username:</label>
        <input type="text" name="username">
        <br>
        <label>Password:</label>
        <input type="password" name="password">
        <br>
        <button type="submit" name="login" class="btn btn-primary">Log In</button>
    </form>
<?php endif; ?>