<?php
include('../../includes/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = oci_parse($conn, "delete from posts where id = {$id}");

    oci_execute($query);
    oci_commit($conn);

    header('Location: list.php');
}
