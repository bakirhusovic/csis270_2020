<?php
    include('../../includes/db.php');
    include('../../includes/loggedUserOnly.php');

    $title = 'All categories';


    $query = oci_parse($conn, 'select * from categories');
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
    <table>
        <?php while($row = oci_fetch_assoc($query)):?>
        <tr>
            <td><?= $row['TITLE'] ?></td>
            <td><a href="edit.php?id=<?= $row['ID'] ?>">EDIT</a></td>
            <td><a href="delete.php?id=<?= $row['ID'] ?>" onclick="return confirm('Are you sure that you want to delete this category')">DELETE</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="new.php">Add a new category</a>
</section>
<?php include('../../includes/footer.php') ?>
</body>
</html>
