<html>
    <head><title> Coin Flip Results </title><head>
    <body>
        <?php
        srand((double) microtime() * 10000000);
        $pick = $_POST["pick"];
        $flip = rand(0, 1);
        if ($pick == 0 && $flip == 0) {
            print("The flip=$flip, which is heads! <br>");
            print '<font color="blue"> You got it right!</font>';
        } elseif ($pick == 1 && $flip == 0) {
            print("The flip=$flip, which is heads! <br>");
            print '<font color="red"> You got it wrong!</font>';
        } elseif ($pick == 0 && $flip == 1) {
            print("The flip=$flip, which is tails! <br>");
            print '<font color="red"> You got it wrong!</font>';
        } elseif ($pick == 1 && $flip == 1){
            print("The flip=$flip, which is tails! <br>");
            print '<font color="blue"> You got it right!</font>';
        } else {
            print "<br>Illegal state error!";
        }
        ?>
    </body>
</html>