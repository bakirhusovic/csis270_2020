<?php
    include('includes/db.php');

    $title = 'New post';

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
<section class="wrapper">
    <form action="save.php" method="POST">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Please enter title">
        </div>
        <div>
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id">
                <option value="21">Sport</option>
                <option value="22">Music</option>
            </select>
        </div>
        <button type="submit">Save</button>
    </form>
</section>
<?php include('includes/footer.php') ?>
</body>
</html>
