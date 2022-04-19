<html>
    <head><title> Radian <-> Degree </title></head>
    <body>
        <font size="4" color="blue"> Radians vs Degrees Converter! </font>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <table>
                <tr>
                    <td> Convertion Type: </td>
                    <td> <input type="radio" name="type" value=1> Radians to Degrees </td>
                    <td> <input type="radio" name="type" value=2> Degrees to Radians </td>
                </tr>
                <tr>
                    <td> Value: </td>
                    <td colspan="2"> <input type="text" name="value1" size="4" maxlength="4"> </td>
                </tr>
                <tr>
                    <td align="right"> <input type="submit" value="Submit"> </td>
                    <td align="left"> <input type="reset" value="Reset"> </td>
                </tr>
            </table>
        </form>

        <font size="4" color="blue"> Convertion Result </font>
        <?php

        function convert($type, $value1, &$value2) {
            if (is_numeric($value1)) {
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
