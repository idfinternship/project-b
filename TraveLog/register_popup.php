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
        <input type="password" name="password">
        <br>
        <label>Confirm Password:</label>
        <input type="password" name="password_confirm">
        <br>
        <button type="submit" name="register" class="btn btn-primary">Register</button>
    </form>
<?php endif; ?>