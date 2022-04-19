<html>
    <head><title> Your Percentage Calculation </title></head><body>
        <font color="blue" size=4> Percentage Calculator </font>
        <?php

        function Calc_perc($buy, $sell) {
            $per = (($sell - $buy) / $buy) * 100;
            return($per);
        }

        $start = $_POST["start"]; $end = $_POST["end"];
        print "<br>Your starting value was $start.";
        print "<br>Your ending value was $end.";
        if (is_numeric($start) && is_numeric($end)) {
            if ($start != 0) {
                $per = Calc_perc($start, $end);
                print "<br> Your percentage change was $per %.";
            } else {
                print "<br> Error! Starting values cannot be zero ";
            }
        } else {
            print "<br> Error! You must have valid numbers for start and end ";
        }
        ?> 
    </body>
</html>