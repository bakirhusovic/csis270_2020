<?php
    session_start();
    include('includes/db.php');

    $title = 'Homepage';


    // $query = mysqli_query($conn, 'select posts.*, categories.title as category_title from posts, categories where posts.category_id = categories.id');
    $query = oci_parse($conn, 'select posts.*, categories.title as category_title from posts, categories where posts.category_id = categories.id and posts.is_published = 1');
    oci_execute($query);
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
        <?php
        if (isset($_SESSION['user_id'])) {
            echo 'Hello ' . $_SESSION['user_first_name'];
        }
        ?>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias animi consectetur distinctio exercitationem expedita explicabo, id libero maiores mollitia obcaecati odio odit officia quaerat, qui quibusdam vero voluptate voluptates! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda debitis deserunt, ducimus excepturi, fugit, libero maiores necessitatibus neque possimus repellat tempore voluptatem. Assumenda atque et molestias necessitatibus numquam praesentium ratione.</p>
        <a href="#">Action</a>
    </div>
</section>
<main class="wrapper">
    <?php while($row = oci_fetch_assoc($query)):?>
    <div>
        <img src="assets/uploads/<?= $row['IMAGE'] ?>" alt="Waterfall">
        <h3><?= $row['TITLE'] ?></h3>
        <p><?= $row['CONTENT'] ?></p>
        <p><?= $row['CATEGORY_TITLE'] ?></p>
        <a href="single.php?id=<?= $row['ID'] ?>">Read more</a>
    </div>
    <?php endwhile; ?>
</main>
<?php include('includes/footer.php') ?>
</body>
</html>
