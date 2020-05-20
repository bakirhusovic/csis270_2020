<?php
session_start();
include('../../includes/db.php');

if ($_POST) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];
    $is_published = $_POST['is_published'];
    $id = $_POST['id'];

    $query = oci_parse($conn, "update posts set title = '{$title}', content = '{$content}', category_id = {$category_id}, is_published = {$is_published} where id = {$id}");
    oci_execute($query);
    oci_commit($conn);

    $_SESSION['msg'] = 'You have successfully updated your post';

    header('Location: list.php');
}
