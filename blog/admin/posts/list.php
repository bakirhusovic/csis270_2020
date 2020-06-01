<?php
    session_start();
    include('../../includes/db.php');
    include('../../includes/loggedUserOnly.php');

    $title = 'All posts';


    // $query = mysqli_query($conn, 'select posts.*, categories.title as category_title from posts, categories where posts.category_id = categories.id');
    $query = oci_parse($conn, 'select posts.*, categories.title as category_title from posts, categories where posts.category_id = categories.id');
    oci_execute($query);
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
    <?php if (isset($_SESSION['msg'])): ?>
    <div><?= $_SESSION['msg'] ?></div>
    <?php
    unset($_SESSION['msg']);
    endif; ?>
    <table>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Published</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php while($row = oci_fetch_assoc($query)):?>
        <tr>
            <td><?= $row['TITLE'] ?></td>
            <td><?= $row['CATEGORY_TITLE'] ?></td>
            <td><?= $row['IS_PUBLISHED'] == 1 ? 'Yes' : 'No' ?></td>
            <td><a href="edit.php?id=<?= $row['ID'] ?>">EDIT</a></td>
            <td><a href="delete.php?id=<?= $row['ID'] ?>" onclick="return confirm('Are you sure that you want to delete post titled: <?= $row{'TITLE'} ?>')">DELETE</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="new_post.php">Add a new post</a>
</section>
<?php include('../../includes/footer.php') ?>
</body>
</html>
