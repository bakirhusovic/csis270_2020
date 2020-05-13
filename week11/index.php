<?php

$conn = mysqli_connect('localhost', 'root', '', 'csis270_blog');

//mysqli_select_db($conn, 'csis270_blog');

//$query = mysqli_query($conn, "INSERT INTO categories (`title`) VALUES ('test PHP')");
//$query = mysqli_query($conn, "DELETE FROM categories WHERE ID > 2");

$query = mysqli_query($conn, 'select * from categories');

while ($row = mysqli_fetch_assoc($query)) {
    //var_dump($row);
    echo $row['title'];
    echo '<br><br><br><br>';
}
