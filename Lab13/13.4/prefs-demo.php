<html>

<head>
    <title>Front Door</title>
</head>
<?php
session_start();
// $bg = $_SESSION['bg'];
// $fg = $_SESSION['fg'];
$name = $_SESSION['name'];
?>


<body>
    <h1>Welcome <?=$name?> to the Store</h1>

    We have many fine products for you to view.<br>
    Please feel free to browse the aisles and stop an assistant at any time.<br>
    But remember, you break it, you bought it!

</body>

</html>