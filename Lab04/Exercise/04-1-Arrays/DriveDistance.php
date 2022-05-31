<html>
    <head><title> Distance from Chicago! </title></head>
    <body> <font size=4 color="blue">
        Welcome to the Distance Calculation Page. </font>
        <br> The page that calculates the distances from Chicago! <br>
        Select a destination: <br>
        <form action="CheckDistance.php" method="get">
            <select name="destination[]" size=5 multiple="multiple">
                <option> Boston </option>
                <option> Dallas </option>
                <option> Las Vegas </option>
                <option> Miami </option>
                <option> Nashville </option>
                <option> Pittsburgh </option>
                <option> San Francisco </option>
                <option> Toronto </option>
                <option> Washington, DC </option>
            </select>
            <br>
            <input type="submit" value="Click To Submit">
            <input type="reset" value="Reset">
        </form>
    </body>
</html>