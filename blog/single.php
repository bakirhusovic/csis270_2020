<?php
session_start();

    include('includes/db.php');

    $id = $_GET['id'];

    //$query = mysqli_query($conn, 'select posts.*, categories.title as category_title from posts, categories where posts.category_id = categories.id and posts.id = ' . $id);
    $query = oci_parse($conn, 'select posts.*, categories.title as category_title from posts inner join categories on posts.category_id = categories.id where posts.id = ' . $id);
    oci_execute($query);
    $row = oci_fetch_assoc($query);

    if (oci_num_rows($query) === 0) {
        die('Post is not found');
    } else {
        oci_execute(oci_parse($conn, 'update posts set read_count = read_count + 1 where id = ' . $id));
        oci_commit($conn);
    }

    $title = $row['TITLE'] . ' | ' . $row['CATEGORY_TITLE'];
?>
<!doctype html>
<html lang="en">
<head>
    <?php include('includes/head.php') ?>
</head>
<body>
<?php include('includes/header.php') ?>
<section id="first-section">
    <div class="wrapper">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias animi consectetur distinctio exercitationem expedita explicabo, id libero maiores mollitia obcaecati odio odit officia quaerat, qui quibusdam vero voluptate voluptates! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda debitis deserunt, ducimus excepturi, fugit, libero maiores necessitatibus neque possimus repellat tempore voluptatem. Assumenda atque et molestias necessitatibus numquam praesentium ratione.</p>
        <a href="#">Action</a>
    </div>
</section>
<main class="wrapper">
    <div>
        <img src="assets/uploads/<?= $row['IMAGE'] ?>" alt="Waterfall">
        <span>Read count: <?= $row['READ_COUNT']; ?></span>
        <h3><?= $row['TITLE'] ?></h3>
        <p><?= $row['CONTENT'] ?></p>
        <p><?= $row['CATEGORY_TITLE'] ?></p>
    </div>
</main>
<?php include('includes/footer.php') ?>
</body>
</html>
