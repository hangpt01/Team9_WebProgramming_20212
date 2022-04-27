<html><head><title> tuna cafe </title><head>
    <body> <font size=4 color="blue">
        welcome to the tuna cafe survey! </font>
        <form action="tuna-cafe-result.php" method="post">
            <?php
                $menu = array('tuna casserole', 'tuna sandwich', 'tuna pie', 'grilled tuna', 'tuna surprise');
                $bestseller = 2;
                print 'please indicate all your favorite dishes. <br>';
                for($i=0 ; $i < count($menu); $i++){
                    print "<input type=\"checkbox\" name=\"prefer[]\" value=$i> $menu[$i]";
                    if($i == $bestseller){
                        print '<font color="red" > our best seller!!!</font>';
                    }
                    print '<br>';
                }
            ?>
           <input type="submit" value="Click To Submit">
            <input type="reset" value="Erase And Resstart">
        </form>
    </body>
</html>