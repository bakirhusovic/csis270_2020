<?php
include('includes/db.php');

if ($_POST) {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $post_id = $_POST['post_id'];
    $reply_to = $_POST['reply_to'] ?? null;
    // $reply_to = isset($_POST['reply_to']) ? $_POST['reply_to'] : null;
    // $post_id = $_GET['post_id'];

    $query = oci_parse($conn, "insert into comments (name, content, post_id, parent_id) values ('{$name}', '{$comment}', {$post_id}, {$reply_to})");
    oci_execute($query);
    oci_commit($conn);

    header('Location: single.php?id=' . $post_id);
}
