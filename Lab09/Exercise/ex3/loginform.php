  
<?php
if (isset($_REQUEST["LinkTo"], $_POST["UserName"], $_POST["Password"])) {
    $linkTo = $_REQUEST["LinkTo"];
    $userName = $_POST["UserName"];
    $password = $_POST["Password"];
} else {
    $linkTo = "";
    $userName = "";
    $password = "";
}


if (isset($userName)) {
    $host = 'localhost';
    $user = 'root';
    $passwd = '';
    $database = 'lab10';
    $table_name = 'account';
    $query = "SELECT * FROM $table_name WHERE username = '$userName' AND password = '$password'";
    $connect = mysqli_connect($host, $user, $passwd, $database);

    if ($connect) {
        $res = mysqli_query($connect, $query);

        $row = mysqli_fetch_row($res);
        if ($res && $row) {
            if ($linkTo != "") {
                header("Location: " . $linkTo);
//                => The role of linkTo is just to make the form appear again if user enter invalid account
            } else {
                header("Location: http://www.google.com");
                exit();
            }
        }
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            Member, please login
        </title>
        <script type="text/javascript">
            function fCommit() {
                if (document.frmLogin.UserName.value == "") {
                    alert("Username must be entered!");
                    document.frmLogin.UserName.focus();
                    return false;
                }

                return true;
            }

            function fReset() {
                document.frmLogin.UserName.value = "";
                document.frmLogin.Password.value = "";
                document.frmLogin.UserName.focus();
            }
        </script>

        <!--EXTERNAL DOCUMENTS--> 
        <script src="./bootstrap.min.css"></script>
        <script src="jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="./bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="container-fluid">
            <form  method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>" name="frmLogin" onsubmit="return fCommit();">

                <div class="wrapper fadeInDown">
                    <div id="formContent">
                        <!-- Tabs Titles -->
                        <h1 class="title"> LOGIN </h1>
                        <p class="note">Welcome</p>
                        <!-- Login Form -->
                        <form>
                            <!--get back the UserName from the last time it's posted-->
                            <input type="text" id="login" class="fadeIn second" name="UserName" placeholder="username" value="<?php echo $userName ?>">
                            <input type="hidden" name="LinkTo" value="<?php echo $linkTo ?>">
                            <input type="text" id="password" class="fadeIn third" name="Password" placeholder="password">
                            <input type="submit" class="fadeIn fourth" value="Log In">
                            <input type="reset" class="fadeIn fifth" value="Reset" onclick="fReset();">
                            <!--<input type="hidden" name="LinkTo" value="<?php echo $linkTo ?>">-->
                            <br><br>
                            <div>
                                <?php echo 'The value of $linkTo is:' . $linkTo ?>
                            </div>
                        </form>
                        <!--Handle the case username is entered but invalid account-->
                        <?php
                        if (isset($userName) && !$row) {
                            echo '
                                <div class="alert alert-danger" style="margin: 10px;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Invalid name and/or password!
                                </div>
                                ';
                        }
                        mysqli_free_result($res);
                        mysqli_close($connect);
                        ?>
                    </div>
                </div>
            </form>
            <script type="text/javascript">
                docmument.frmLogin.UserName.focus();
            </script>
        </div>
    </body>
</html>
