<?php
session_start();

    include('includes/db.php');

    $id = $_GET['id'];

    //$query = mysqli_query($conn, 'select posts.*, categories.title as category_title from posts, categories where posts.category_id = categories.id and posts.id = ' . $id);
    $query = oci_parse($conn, 'select posts.*, categories.title as category_title from posts inner join categories on posts.category_id = categories.id where posts.id = ' . $id);
    oci_execute($query);
    $row = oci_fetch_assoc($query);

    $commentsQuery = oci_parse($conn, "select * from comments where post_id = {$id} order by coalesce(parent_id, id) desc, id");
    oci_execute($commentsQuery);

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
    <style>
        .reply {
            margin-left: 50px;
        }
    </style>
</head>
<body>
<?php include('includes/header.php') ?>
<section id="first-section">
    <div class="wrapper">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias animi consectetur distinctio exercitationem expedita explicabo, id libero maiores mollitia obcaecati odio odit officia quaerat, qui quibusdam vero voluptate voluptates! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda debitis deserunt, ducimus excepturi, fugit, libero maiores necessitatibus neque possimus repellat tempore voluptatem. Assumenda atque et molestias necessitatibus numquam praesentium ratione.</p>
        <a href="#comments">scroll to comments</a>
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
<section class="wrapper">
    <form action="save_comment.php?post_id=<?= $row['ID'] ?>" method="post">
        <?php if (isset($_GET['reply_to'])): ?>
            <input type="hidden" name="reply_to" value="<?= $_GET['reply_to'] ?>">
        <?php endif; ?>
        <input type="hidden" name="post_id" value="<?= $row['ID'] ?>">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
        </div>

        <?php if (isset($_GET['reply_to'])): ?>
            <a href="single.php?id=<?= $id ?>#comments">Cancel reply</a>
        <?php endif; ?>
        <button type="submit">Submit</button>
    </form>
    <div id="comments">
        <?php while($comment = oci_fetch_assoc($commentsQuery)): ?>
            <div style="margin-bottom: 30px; border-bottom: 1px solid gray" <?= $comment['PARENT_ID'] ? 'class="reply"' : null ?>>
                <strong>Name: </strong> <?= $comment['NAME'] ?><br>
                <strong>Comment: </strong> <?= nl2br($comment['CONTENT']) ?>
                <br><br>
                <a href="single.php?id=<?= $id ?>&reply_to=<?= $comment['PARENT_ID'] ?? $comment['ID'] ?>#comments">Reply</a>
            </div>
        <?php endwhile; ?>
    </div>
</section>
<?php include('includes/footer.php') ?>
</body>
</html>
