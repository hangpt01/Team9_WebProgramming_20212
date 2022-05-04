<?php
    $host = 'db';
    $user = 'root';
    $pass = 'example';
    $mydb = 'business_service';
    $table_name = 'Categories';

    $connect = new mysqli($host, $user, $pass, $mydb);

    if ($connect->connect_error) {
        die("Cannot connect to $server using $user");
    } else {
        $catid = $_POST['catid'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $sql = "INSERT INTO $table_name (CategoryID, Title, Description) VALUES ('$catid', '$title', '$description');";
        $connect->query($sql);

        header("Location: ./index.php?status=success");
    }
?>

