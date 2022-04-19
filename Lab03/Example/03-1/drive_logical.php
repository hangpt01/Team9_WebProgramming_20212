<html>
    <head><title>Number Guess Results </title><head>
    <body>
        <?php
        $pick1 = $_POST["pick1"];
        $pick2 = $_POST["pick2"];
        $combo1 = 5;
        $combo2 = 6;
        if (($pick1 == $combo1) && ($pick2 == $combo2)) {
            print ("Congratulations you got both secret numbers $combo1 $combo2!");
        } elseif (($pick1 == $combo1) || ($pick2 == $combo2)) {
            print ("You got one number right.");
        } else {
            print ("Sorry, you are totally wrong!");
        }
        print ("You guessed $pick1 and $pick2.");
        ?>
    </body>
</html>