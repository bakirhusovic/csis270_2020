<?php
include('../../includes/db.php');

if ($_POST) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];
    $is_published = $_POST['is_published'];

    $imageFileName = $_FILES['image']['name'];

    move_uploaded_file($_FILES['image']['tmp_name'], '../../assets/uploads/' . $imageFileName);

    $query = oci_parse($conn, "insert into posts (title, content, category_id, image, is_published) values ('{$title}', '{$content}', {$category_id}, '{$imageFileName}', {$is_published})");
    oci_execute($query);
    oci_commit($conn);

    header('Location: list.php');
}
