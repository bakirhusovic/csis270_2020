<?php

if ($_POST) {
    echo 'Date is ' . $_POST['day'] . '.' . $_POST['month'] . '.' . $_POST['year'];

    echo '<br>';

    foreach ($_POST['options'] as $option) {
        echo $option . ', ';
    }

    echo '<br>';

    for ($i = 0; $i < count($_POST['options']); $i++) {
        echo $_POST['options'][$i] . ', ';
    }

    echo '<br>';

    echo implode(', ', $_POST['options']);
} else {
    echo 'You are not allowed to access this script';
}