<html> 
    <head>
        <title> Decisions </title>
    </head>
    <body>
        <?php
        $grade1 = $_POST["grade1"];
        $grade2 = $_POST["grade2"];
        $average = ($grade1 + $grade2) / 2;
        if ($average > 89) {
            print "Average = $average You got an A";
        } else if ($average > 79) {
            print "Average = $average You got a B";
        } else if ($average > 69) {
            print "Average = $average You got a C";
        } else if ($average > 59) {
            print "Average = $average You got a D";
        } else if ($average >= 0) {
            print "Average = $average You got an F";
        } else {
            print "Illegal average less than 0 average=$average";
        }
        $max = $grade1;
        if ($grade1 < $grade2) {
            $max = $grade2;
        }
        print ("<br>Your max score was $max");
        ?> 
    </body>
</html>