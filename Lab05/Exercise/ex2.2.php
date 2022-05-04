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
    $busunessName = $_POST['busunessName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $telephone = $_POST['telephone'];
    $url = $_POST['url'];
    $Categories = $_POST['name'];
    
    $sql = "INSERT INTO Businesses (businessID, Name, Address, City, Telephone, URL) VALUES ($busunessName, '$address', '$city', 'telephone', 'url');";
    $connect->query($sql);

    $sql = "INSERT INTO Biz_Categories (BusinessID, CategoryID) VALUES ('$busunessName', '$Categories');";
    $connect->query($sql);

    header("Location: ./exp2.php?status=success");
}

