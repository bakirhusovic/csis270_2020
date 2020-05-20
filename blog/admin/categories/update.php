<?php
include('../../includes/db.php');

if ($_POST) {
    $title = $_POST['title'];
    $id = $_POST['id'];

    $query = oci_parse($conn, "update categories set title = '{$title}' where id = {$id}");
    oci_execute($query);
    oci_commit($conn);

    header('Location: list.php');
}
