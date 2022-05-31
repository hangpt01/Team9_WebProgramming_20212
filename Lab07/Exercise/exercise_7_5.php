<html>
    <head><title> Product Information </title></head>
    <body>
        <?php
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $url = $_POST["url"];

        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            print "Invalid Phone number = $phone";
            print '<br>';
        } else {
            print "Phone number = $phone is valid";
            print '<br>';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            print "Invalid Email = $email";
            print '<br>';
        } else {
            print("Email=$email is valid");
            print '<br>';
        }

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            print "Invalid URL = $url";
            print '<br>';
        } else {
            print("Url=$url is valid");
            print '<br>';
        }
        ?>
    </body>

</html>

