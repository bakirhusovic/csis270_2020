<?php
    session_start();
    include('../../includes/loggedUserOnly.php');
    include('../../includes/db.php');

    $title = 'New category';

?>
<!doctype html>
<html lang="en">
<head>
    <?php include('../../includes/head.php') ?>
</head>
<body>
<?php include('../../includes/header.php') ?>
<section id="first-section">
    <div class="wrapper">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias animi consectetur distinctio exercitationem expedita explicabo, id libero maiores mollitia obcaecati odio odit officia quaerat, qui quibusdam vero voluptate voluptates! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda debitis deserunt, ducimus excepturi, fugit, libero maiores necessitatibus neque possimus repellat tempore voluptatem. Assumenda atque et molestias necessitatibus numquam praesentium ratione.</p>
        <a href="#">Action</a>
    </div>
</section>
<section class="wrapper">
    <form action="save.php" method="POST">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Please enter title">
        </div>
        <button type="submit">Save</button>
    </form>
</section>
<?php include('../../includes/footer.php') ?>
</body>
</html>
