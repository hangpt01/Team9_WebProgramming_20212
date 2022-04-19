<!--
    Slide 36
-->

<html>
    <head><title> Simple Table Function </title> </head> <body>
        <font color="blue" size="4"> Here Is a Simple Table 
        <table border=1>
            <?php

            function OutputTableRow() {
                print '<tr><td>One</td><td>Two</td></tr>';
            }

            OutputTableRow();
            OutputTableRow();
            OutputTableRow();
            ?>
        </table>
    </body>
</html>