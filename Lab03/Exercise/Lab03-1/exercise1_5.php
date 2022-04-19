<html>
    <head><title> Date Time Validation </title></head>
    <body>
        <br> Enter your name and select date and time for the appoinment <br>
        <br>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
            <?php
            if (array_key_exists("date", $_GET)) {
                $name = $_GET["name"];
                $date = $_GET["date"];
                $month = $_GET["month"];
                $year = $_GET["year"];
                $hour = $_GET["hour"];
                $minute = $_GET["minute"];
                $second = $_GET["second"];
            } else {
                $name = "";
                $date = 0;
                $month = 0;
                $year = 0;
                $hour = 0;
                $minute = 0;
                $second = 0;
            }
            ?>
            
            <table>
                <tr>
                    <td> Your Name: </td>
                    <td colspan="3"> <input type="text" size="16" name="name"> </td>
                </tr>
                <tr>
                    <td> Date: </td>
                    <td> <select name="date">
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                if ($date == $i) {
                                    print("<option selected>$i</option>");
                                } else {
                                    print("<option>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td> <select name="month">
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                if ($month == $i) {
                                    print("<option selected>$i</option>");
                                } else {
                                    print("<option>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td> <select name="year">
                            <?php
                            for ($i = 2022; $i <= 2032; $i++) {
                                if ($year == $i) {
                                    print("<option selected>$i</option>");
                                } else {
                                    print("<option>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td> Time: </td>
                    <td> <select name="hour">
                            <?php
                            for ($i = 0; $i <= 23; $i++) {
                                if ($hour == $i) {
                                    print("<option selected>$i</option>");
                                } else {
                                    print("<option>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td> <select name="minute">
                            <?php
                            for ($i = 0; $i <= 59; $i++) {
                                if ($minute == $i) {
                                    print("<option selected>$i</option>");
                                } else {
                                    print("<option>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td> <select name="second">
                            <?php
                            for ($i = 0; $i <= 59; $i++) {
                                if ($second == $i) {
                                    print("<option selected>$i</option>");
                                } else {
                                    print("<option>$i</option>");
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right"> <input type="submit" value="Submit"> </td>
                    <td align="left"> <input type="reset" value="Reset"> </td>
                </tr>
            </table>

                <?php
                if (array_key_exists("date", $_GET)) {
//                    $name = $_GET["name"];
//                    $date = $_GET["date"];
//                    $month = $_GET["month"];
//                    $year = $_GET["year"];
//                    $hour = $_GET["hour"];
//                    $minute = $_GET["minute"];
//                    $second = $_GET["second"];
                    
                    print("<br>Hi $name!<br>");
                    print("You have chosen to have an appointment on $hour:$minute:$second, $date/$month/$year<br><br>");
                    print("More information<br><br>In 12 hours, the time and date is ");
                    
                    if ($hour < 12) {
                        print("$hour:$minute:$second AM");
                    } else {
                        printf("%d:%d:%d PM", ($hour-12), $minute, $second);
                    }
                    print(", $date/$month/$year<br><br>");
                    
                    if ($year % 4 == 0) {
                        $is_leap_year = 1;
                    } else {
                        $is_leap_year = 0;
                    }
                    
                    print("This month has ");
                    switch ($month){
                        case 1:
                        case 3:
                        case 5:
                        case 7:
                        case 8:
                        case 10:
                        case 12: 
                        {
                            print("31");
                            break;
                            
                        }
                        case 4:
                        case 6:
                        case 9:
                        case 11:
                        {
                            print("30");
                            break;
                            
                        }
                        case 2:
                        {
                            if ($is_leap_year) {
                                print("29");
                            } else {
                                print("28");
                            }
                            break;
                        }
                    }
                    
                    print(" days!");
                }
                ?>

        </form>
    </body>
</html>
