<html>
    <head>
        <title> Date Time </title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
            <table>
                <tr>
                    <td> First Person's Name: </td>
                    <td colspan="3"> <input type="text" name="name1"> </td>
                </tr>
                <tr>
                    <td> First Person's Birthday: (in dd/mm/yyyy) </td>
                    <td> <input type="number" min="1" max="31" name="day1"> / </td>
                    <td> <input type="number" min="1" max="12" name="month1"> / </td>
                    <td> <input type="number" min="1022" max="2022" name="year1"> </td>
                </tr>
                <tr>
                    <td> Second Person's Name: </td>
                    <td colspan="3"> <input type="text" name="name2"> </td>
                </tr>
                <tr>
                    <td> Second Person's Birthday: (in dd/mm/yyyy) </td>
                    <td> <input type="number" min="1" max="31" name="day2"> / </td>
                    <td> <input type="number" min="1" max="12" name="month2"> / </td>
                    <td> <input type="number" min="1022" max="2022" name="year2"> </td>
                </tr>
                <tr>
                    <td align="right"> <input type="submit" value="Submit"> </td>
                    <td align="left"> <input type="reset" value="Reset"> </td>
                </tr>
            </table>
        </form>
        
        <font size="4" color="blue"> Date Time Information </font>
        <?php

        function verify($day, $month, $year) {
            if () {
                if ($type == 1) {
                    $value2 = $value1 * 180 / pi();
                    return 1;
                } elseif ($type == 2) {
                    $value2 = $value1 * pi() / 180;
                    return 1;
                } else {
                    print ("Unknown convert type = $type");
                    return 0;
                }
            } else {
                return 0;
            }
        }

        $value1 = $_POST["value1"];
        $type = $_POST["type"];
        $value2 = 0;
        $ret = convert($type, $value1, $value2);
        if (array_key_exists("value1", $_POST)) {
            if ($ret) {
                if ($type == 1) {
                    printf("<br>Converted %.4f radians to %.4f degrees.", $value1, $value2);
                } else {
                    printf("<br>Converted %.4f degrees to %.4f radians.", $value1, $value2);
                }
            } else {
                print"<br>Illegal value received";
            }
        }
        ?>
    </body>
</html>
