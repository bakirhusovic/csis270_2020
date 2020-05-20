<?php
    session_start();
    include('../../includes/loggedUserOnly.php');
    include('../../includes/db.php');

    $query = oci_parse($conn, 'select * from categories');
    oci_execute($query);

    $title = 'New post';

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
    <form action="save.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image" required>
        </div>
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Please enter title" required>
        </div>
        <div>
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" required></textarea>
        </div>
        <div>
            <label>Is published</label><br>
            <input type="radio" name="is_published" id="is_published_true" value="1" required>
            <label for="is_published_true">Yes</label>
            <input type="radio" name="is_published" id="is_published_false" value="0" required>
            <label for="is_published_false">No</label>
        </div>
        <div>
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" required>
                <?php while($row = oci_fetch_assoc($query)): ?>
                    <option value="<?= $row['ID'] ?>"><?= $row['TITLE'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit">Save</button>
    </form>
</section>
<?php include('../../includes/footer.php') ?>
</body>
</html>
