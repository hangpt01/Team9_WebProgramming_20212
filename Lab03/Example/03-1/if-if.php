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
            print "Average score: $average You got an A! <br>";
        }
        $max = $grade1;
        if ($grade1 < $grade2) {
            $max = $grade2;
        }
        print ("Your max score was $max");
        ?> 
    </body>
</html>