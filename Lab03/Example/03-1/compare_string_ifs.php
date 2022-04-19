<html> 
    <head>
        <title>Decisions</title>
    </head>
    <body>
        <?php
        $first = $_POST["first"];
        $second = $_POST["second"];
        print ("First = $first Second = $second <br>");
        if ($first == $second) {
            print "$first and $second are equal";
        }
        if ($first < $second) {
            print "$first is less than $second";
        }
        if ($first > $second) {
            print "$first is greater than $second";
        }
        ?> 
    </body>
</html>