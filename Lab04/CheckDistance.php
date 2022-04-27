<html>
    <head><title>Distance and time calculations</title></head>
    <body>
        <?php
            $cities = array ('Dallas' => 803, 'Toronto' => 435, 'Boston' => 848,
                'Nashville' => 406, 'Las Vegas' => 1526, 'San Francisco' => 1835,
                'Washington, DC' => 595, 'Miami' => 1189, 'Pittsburgh' => 409);
            $destination = $_POST['destination'];
            $count=1;
            print "<table  style=\"width:100%\"> 
                    <tr>
                        <td>No.</td>
                        <td>Destination</td>
                        <td>Distance</td>
                        <td>Driving time</td>
                        <td>Walking time</td>
                    </tr>";
            foreach($destination as $location){
                if(isset($cities[$location])){
                    $distance = $cities[$location];
                    $time =round(($distance/60),2);
                    $walktime = round($distance/5, 2);
                    print " <tr>
                        <td>$count</td>
                        <td>$location</td>
                        <td>$distance</td>
                        <td>$time</td>
                        <td>$walktime</td>
                    </tr>";
                    $count++;
                   
                } else {
                    print "sorry, do not have destination information for $location.";
                }
            }
            print "</table>";
            
        ?>
    </body>
</html>