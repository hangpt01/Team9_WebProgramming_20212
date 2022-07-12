<html>

<head>
    <title> Order Product 2 </title>
</head>

<body>
    <?php
    $username = $_POST["username"];
    $password =  $_POST["password"];

    // connect to DB
    $server = "localhost";
    $user = "hangpt";
    $dbpassword = "122904";
    $dbname = "web_prog";

    $connection = new mysqli($server, $user, $dbpassword, $dbname);
    if ($connection->connect_error) {
        die("DB Connection failed");
    }

    $sql_query = "SELECT Password, DisplayName FROM Users where Username = '$username'";
    $retrieved_password = $connection->query($sql_query);
    if (!$retrieved_password) {
        die("Cannot retrieve password");
    } else {
        if ($result = mysqli_fetch_array($retrieved_password)) {
            if ($result["Password"] == $password) {
                echo 'Wrong password! Redirecting to the login page';
                session_start();
                $_SESSION['name'] = $result["DisplayName"];
                header("Refresh:2 url=./prefs-demo.php", true);
            } else {
                echo "Wrong password!";
                header("Refresh:2 url=./login.php", true);
            }
        } else {
            echo 'Username doesn\'t exist! Redirecting to the login page';
            header("Refresh:2 url=./login.php", true);
        }
    }
    ?>
</body>

</html>