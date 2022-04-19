<!--
    Slide 53
-->

<html>
    <head><title> Hardware Heaven </title></head> 
    <body>
        <?php
        include("header.php");
        $buy = 2.50;
        $sell = 10.00;
        print "<br>It is $time.";
        print "We have hammers on special for \$$sell!";
        $markup = Calc_perc($buy, $sell);
        print "<br>Our markup is only $markup%!!";
        ?>
    </body>
</html>