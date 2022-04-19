<!--
    Slide 40
-->

<html>
    <head><title> Simple Table Function </title> </head> 
    <body>
        <font color="blue" size=4> Revised Simple Table 
        <table border=1>
            <?php

            function OutputTableRow($col1, $col2) {
                print "<tr><td>$col1</td><td>$col2</td></tr>";
            }

            for ($i = 1; $i <= 4; $i++) {
                $message1 = "Row $i Col 1";
                $message2 = "Row $i Col 2";
                OutputTableRow($message1, $message2);
            }
            ?>
        </table>
    </body>
</html>
