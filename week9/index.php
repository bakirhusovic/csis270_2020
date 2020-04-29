<?php

    function checkRequiredField ($value) {
        return isset($value) && !empty($value);
    }

    if ($_POST) {
        if (checkRequiredField($_POST['first_name']) && checkRequiredField($_POST['last_name']) && checkRequiredField($_POST['email']) && checkRequiredField($_POST['password']) && is_numeric($_POST['age'])) {
            $msg = 'Form is valid';
            // connect to the database
            // insert into users (fname, lname...
        } else {
            $msg = 'Form is invalid';
        }
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello world</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="form.css">
</head>
<body>

<header>
    <div class="wrapper">
        <h1>Layout example</h1>
        <nav>
            <div class="menu-item">
                <a href="#">Home</a>
                <div>
                    <a href="#">Submenu 1</a>
                    <a href="#">Submenu 2</a>
                    <a href="#">Submenu 3</a>
                </div>
            </div>
            <a href="#">Friends</a>
            <a href="#">Settings</a>
        </nav>
    </div>
</header>
<main class="wrapper">
    <section class="block" id="section4">
        <form method="POST">
            <div class="form-field">
                <label for="first_name">First name</label>
                <input placeholder="Please type in your First name" type="text" name="first_name" id="first_name" value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : $_GET['first_name'] ?>">
            </div>
            <div class="form-field">
                <label for="last_name">Last name</label>
                <input placeholder="Please type in your Last name" type="text" name="last_name" id="last_name" value="<?= $_POST['last_name'] ?? $_GET['last_name'] ?>">
            </div>
            <div class="form-field">
                <label for="email">Email</label>
                <input placeholder="Please type in your Email" type="email" name="email" id="email" value="<?= $_POST['email'] ?? $_GET['email'] ?>">
            </div>
            <div class="form-field">
                <label for="age">Age</label>
                <input placeholder="Please type in your Age" min="20" step="0.1" type="number" name="age" id="age" value="<?= $_POST['age'] ?? $_GET['age'] ?>">
            </div>
            <div class="form-field">
                <label for="password">Password</label>
                <input placeholder="Please type in your Password" type="password" name="password" id="password">
            </div>
            <button type="submit">Submit</button>
            <?php

            if (isset($msg)) {
                echo $msg;
            }

            ?>
        </form>
    </section>
</main>

<footer>
    <div class="wrapper">
        Footer &copy; 2020
    </div>
</footer>
</body>
</html>