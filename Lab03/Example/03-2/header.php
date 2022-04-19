<font size=4 color="blue">
Welcome to Harry’s Hardware Heaven!
</font><br> We sell it all for you!<br>
<?php
$time = date('H:i');

function Calc_perc($buy, $sell) {
    $per = (($sell - $buy ) / $buy) * 100;
    return($per);
}
?>