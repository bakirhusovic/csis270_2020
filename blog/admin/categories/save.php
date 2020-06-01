<?php
include('../../includes/db.php');

if ($_POST) {
    $title = $_POST['title'];

    $query = oci_parse($conn, "insert into categories (title) values ('{$title}') returning id into :id");
    oci_bind_by_name($query, ':id', $id);
    oci_execute($query);
    oci_commit($conn);

    // header('Location: list.php');
    header('Content-Type: application/json');
    $response = [
        'msg' => 'Success',
        'new_id' => $id,
    ];
    echo json_encode($response);
}
