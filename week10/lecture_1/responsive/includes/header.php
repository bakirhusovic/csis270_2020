<header>
    <div class="wrapper">
        <h1>Layout example</h1>
        <nav>
            <div class="menu-item">
                <a href="index.php" <?= $_SERVER['REQUEST_URI'] === '/index.php' ? 'class="active"' : null ?>>Home</a>
                <div>
                    <a href="#">Submenu 1</a>
                    <a href="#">Submenu 2</a>
                    <a href="#">Submenu 3</a>
                </div>
            </div>
            <a href="about_us.php" <?= $_SERVER['REQUEST_URI'] === '/about_us.php' ? 'class="active"' : null ?>>About us</a>
            <a href="#">Contact us</a>
            <a href="#">Settings</a>
        </nav>
    </div>
</header>