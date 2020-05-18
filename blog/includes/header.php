<header>
    <div class="wrapper">
        <h1>Blog</h1>
        <nav>
            <a href="/">Homepage</a>
            <a href="#">Link 2</a>
            <a href="#">Link 3</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php">Logout</a>
            <?php else: ?>
            <a href="login.php">Log in</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
