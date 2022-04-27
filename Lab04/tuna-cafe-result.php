<html><head><title> tuna result</title></head>
<body>
    <font size=4 color="blue"> tuna cafe result </font>
    <?php
        $menu = array('tuna casserole', 'tuna sandwich', 'tuna pie', 'grilled tuna', 'tuna surprise');
        $prefer = $_POST["prefer"];
        if(count($prefer) == 0){
            print 'oh no! please pick fomething as your favorite!';

        } else {
            print '<br>your selections were <ul>';
            foreach($prefer as $item){
                print "<li>$menu[$item]</li>";
            }
            print '</ul>';
        }
    ?>
</body>
</html>