<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav>
    <ul>
        <!-- Main Navigation -->
        <li><a href="index.php">Home</a></li>
        <li><a href="recipes.php">Recipes</a></li>
        <li><a href="contact.php">Contact</a></li>

        <!-- Logged-in and logged-out states -->
        <?php if (isset($_SESSION["user_id"])): ?>
            <li><a href="logout.php">Logout</a></li> <!-- Logout for logged-in users -->
        <?php else: ?>
            <?php if (basename($_SERVER['PHP_SELF']) !== 'contact.php'): ?>
                <li><a href="login.php">Login</a></li> <!-- Login if not logged in -->
                <li><a href="register.php">Register</a></li> <!-- Register if not logged in -->
            <?php endif; ?>
        <?php endif; ?>
    </ul>
</nav>
