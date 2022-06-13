<html>
    <head>
        <title>Create Table</title></head><body>
        <?php
        $server = 'localhost';
        $user = 'hangpt';
        $pass = '122904';
        $mydb = 'web_prog';
        $table_name = 'Products_2';
        $connect = mysqli_connect($server, $user, $pass);
        if (!$connect) {
            echo"not connected.";
            die("Cannot connect to $server using $user");
        } else {
            echo"connected.";
            $SQLcmd = "CREATE TABLE $table_name (
                        ProductID INT UNSIGNED NOT NULL
                        AUTO_INCREMENT PRIMARY KEY,
                        Product_desc VARCHAR(50),
                        Cost INT, Weight INT, Numb INT)";
            mysqli_select_db($connect, $mydb);
            if (mysqli_query($connect, $SQLcmd)) {
                print '<font size="4" color="blue" >Created Table';
                print "<i>$table_name</i> in database<i>$mydb</i><br></font>";
                print "<br>SQLcmd=$SQLcmd";
            } else {
                die("Table Create Creation Failed SQLcmd=$SQLcmd");
            }
            mysqli_close($connect);
        }
        ?>
    </body>
</html>