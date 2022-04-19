<!--
    Slide 38
-->

<html>
    <head><title> While Loop </title></head>
    <body>
        <font size="4" color="blue"> Table of Square and Cube Values
        </font>
        <table border=1>
            <th> Numb </th> <th> Sqr </th> <th> Cubed </th>
            <?php
            $start = $_POST["start"]; $end = $_POST["end"];
            $i = $start;
            while ($i <= $end) {
                $sqr=$i*$i;
                $cubed=$i*$i*$i;
                print ("<tr><td>$i</td><td>$sqr</td><td>$cubed</td></tr>");
                $i = $i + 1;
            }
            ?>
        </table>
    </body>
</html>