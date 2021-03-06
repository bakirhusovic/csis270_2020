<?php
    include('../../includes/db.php');
    include('../../includes/loggedUserOnly.php');

    $title = 'Edit post';

    $id = $_GET['id'];
    $query = oci_parse($conn, 'select * from posts where id = ' . $id);
    oci_execute($query);
    $post = oci_fetch_assoc($query);

    $categoryQuery = oci_parse($conn, 'select * from categories');
    oci_execute($categoryQuery);
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
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Please enter title" value="<?= $post['TITLE'] ?>">
        </div>
        <div>
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10"><?= $post['CONTENT'] ?></textarea>
        </div>
        <div>
            <label>Is published</label><br>
            <input type="radio" name="is_published" id="is_published_true" value="1" required <?= $post['IS_PUBLISHED'] == 1 ? 'checked' : null ?>>
            <label for="is_published_true">Yes</label>
            <input type="radio" name="is_published" id="is_published_false" value="0" required <?= $post['IS_PUBLISHED'] == 0 ? 'checked' : null ?>>
            <label for="is_published_false">No</label>
        </div>
        <div>
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id">
                <?php while($category = oci_fetch_assoc($categoryQuery)): ?>
                    <option value="<?= $category['ID'] ?>" <?= $post['CATEGORY_ID'] == $category['ID'] ? 'selected' : null ?>><?= $category['TITLE'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit">Save</button>
    </form>
</section>
<?php include('../../includes/footer.php') ?>
</body>
</html>
