<html>
    <head>
        <title> Date Time </title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
            <table>
                <tr>
                    <td> First Person's Name: </td>
                    <td> <input type="text" name="name1"> </td>
                </tr>
                <tr>
                    <td> First Person's Birthday: (in mm/dd/yyyy) </td>
                    <td> <input type="text" name="day1"> </td>
                </tr>
                <tr>
                    <td> Second Person's Name: </td>
                    <td> <input type="text" name="name2"> </td>
                </tr>
                <tr>
                    <td> Second Person's Birthday: (in mm/dd/yyyy) </td>
                    <td> <input type="text" name="day2"> </td>
                </tr>
                <tr>
                    <td align="right"> <input type="submit" value="Submit"> </td>
                    <td align="left"> <input type="reset" value="Reset"> </td>
                </tr>
            </table>
        </form>

        <font size="4" color="blue"> Date Time Information </font>
        <?php

        function validateDate($date, $format = 'd/m/Y') {
            $d = DateTime::createFromFormat($format, $date);
            return $d && $d->format($format) === $date;
        }

        $name1 = $_GET["name1"];
        $day1 = $_GET["day1"];
        $name2 = $_GET["name1"];
        $day2 = $_GET["day2"];
        if (array_key_exists("name1", $_GET)) {
            if (validateDate($day1) && validateDate($day2)) {
                print ("<br><br>These are two valid birthdays.<br>");

                $date1 = date_create($day1);
                $date2 = date_create($day2);
                print("<br>The first birthday is: ");
                echo date_format($date1, "l, F j, Y");
                print("<br>The second birthday is: ");
                echo date_format($date2, "l, F j, Y");

                $diff = date_diff($date1, $date2);
                printf("<br><br>The difference in days between two dates is: ");
                echo $diff->format("%a days.");

                $age1 = date_diff($date1, date_create($today));
                print ("<br><br>The first person's age is: ");
                echo $age1->format("%y.");
                $age2 = date_diff($date2, date_create($today));
                print ("<br>The second person's age is: ");
                echo $age2->format("%y.");
                print("<br>The different years between two people is: ");
                echo $diff->format("%y.");
            } else {
                print ("<br><br>Exists at least one invalid birthdays.<br>");
            }
        }
        ?>
    </body>
</html>
