<!--
    Slide 33
-->

<html>
    <head>
        <title> Loops </title>
    </head>
    <body> <font size="5" color="blue">
        Generate Square and Cube Values </font>
        <br>
        <form action="while_loop.php" method="post">
            <?php
            print ("Select Start Number");
            print ("<select name=\"start\">");
            for ($i = 0; $i < 10; $i++) {
                print("<option>$i</option>");
            }
            print ("</select>");
            print ("<br>Select End Number");
            print ("<select name=\"end\">");
            for ($i = 0; $i < 20; $i++) {
                print("<option>$i</option>");
            }
            print ("</select>");
            ?>
            <br> <input type="submit" value="Submit">
            <input type="reset" value="Clear and Restart">
        </form>
    </body>
</html>
