<?php
include('../../includes/db.php');

if ($_POST) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];
    $is_published = $_POST['is_published'];

    $imageFileName = $_FILES['image']['name'];

    move_uploaded_file($_FILES['image']['tmp_name'], '../../assets/uploads/' . $imageFileName);

    $query = oci_parse($conn, "insert into posts (title, content, category_id, image, is_published) values ('{$title}', '{$content}', {$category_id}, '{$imageFileName}', {$is_published}) returning id into :id");
    oci_bind_by_name($query, ':id', $newId);
    oci_execute($query);
    oci_commit($conn);

    // var_dump($newId);

    header('Location: list.php');
}
