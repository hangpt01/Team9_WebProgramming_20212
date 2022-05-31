<html>
    <head>
        <title> Date Check Result </title>
    </head>
    <body>
        <?php
        $date = $_POST['date'];
        $two = '[[:digit:]]{2}';
        $month = '[0-1][[:digit:]]';
        $day = '[0-3][[:digit:]]';
        $year = "2[[:digit:]]$two";
        if (preg_match("#^($month)/($day)/($year)$#", $date)) {
            list($mon, $day, $year) = preg_split('#/#', $date );
            if ($mon >= 1 && $mon <= 12) {
                if ($day <= 31) {
                    print "Valid date mon=$mon day=$day year=$year";
                } else {
                    print " Illegal day specifed Day = $day";
                }
            } else {
                print " Illegal month specifed Mon = $mon";
            }
        } else {
            print ("Invalid date format = $date");
        }
        ?>
    </body>
</html>
