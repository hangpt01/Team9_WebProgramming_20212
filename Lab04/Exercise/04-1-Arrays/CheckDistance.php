<html>
    <head><title> Distance and Time Calculations </title></head>
    <body>
        <?php
//        $destination = $_GET["destination"];
        $cities = array('Dallas' => 803, 'Toronto' => 435, 'Boston' => 848, 'Nashville' =>
            406, 'Las Vegas' => 1526, 'San Francisco' => 1835, 'Washington, DC' => 595, 'Miami'
            => 1189, 'Pittsburgh' => 409);
        if(!empty($_GET["destination"])) {
            print("From Chicago to:");
            print '<table border=1> <th> No. <th> Destination <th> Distance <th> Driving time <th> Walking time ';
            $id = 1;
            foreach ($_GET["destination"] as $destination) {
                if (isset($cities[$destination])) {
                    $distance = $cities[$destination];
                    $time = round(($distance / 60), 2);
                    $walktime = round(($distance / 5), 2);
                    
                    print "<tr> <td> $id </td>";
                    print "<td> $destination </td>";
                    print "<td> $distance </td>";
                    print "<td> $time </td>";
                    print "<td> $walktime </td></tr>";
                    $id = $id + 1;
                } else {
                    print "Sorry, do not have destination information for $destination.";
                }
            }
        }
        ?>
    </body>
</html>