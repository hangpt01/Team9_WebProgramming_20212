<?php session_start(); ?>
<html>

<head>
    <title>Order Product</title>
</head>

<body>
    <?php
    $name =  $_POST['name'];
    $code = $_POST['code'];
    $sample_hidden = $_SESSION['sample_hidden'];
    $product = $_SESSION['product'];
    $quantity = $_SESSION['quantity'];

    print("Hidden sample: $sample_hidden\n");
    print("Name: $name\n");
    print("Zipcode: $code\n");
    print("Product: $product\n");
    print("Quantity: $quantity\n");
    ?>
</body>

</html>