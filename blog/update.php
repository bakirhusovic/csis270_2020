<?php
include('includes/db.php');

if ($_POST) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];
    $id = $_POST['id'];

    $query = oci_parse($conn, "update posts set title = '{$title}', content = '{$content}', category_id = {$category_id} where id = {$id}");
    oci_execute($query);
    oci_commit($conn);

    header('Location: list.php');
}
