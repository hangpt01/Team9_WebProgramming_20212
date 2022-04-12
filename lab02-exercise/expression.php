<html>
    <head> <title> A Simple Form </title> </head>
<body>
    <!-- <font size="5> thank you: got your input. </font> -->
    <?php 
        $name = $_GET["studentname"];
        $id = $_GET["stID"];
        $hobby1= $_GET["hobby1"];
        $hobby2= $_GET["hobby2"];
        $hobby3= $_GET["hobby3"];
        $hobby4= $_GET["hobby4"];
        $email = $_GET["email"];
        $contact = $_GET["contact"];
        $uniName = $_GET["uni"];
        print("<br> Your name is $name <br> your id is $id");
        print("<br> class: $class");
        print("<br> your university is $uniName");
        print("<br>your email address is $email");
        $count = 1;
        if($hobby1 != NULL){
            print("<br> hobby $count $hobby1");
            $count++;
        }

        if($hobby2 != NULL){
            print("<br> hobby $count $hobby2");
            $count++;
        } 
        if($hobby3 != NULL){
            print("<br> hobby $count $hobby3");
            $count++;
        } 
        if($hobby4 != NULL){
            print("<br> hobby $count $hobby4");
            $count++;
        } 
        print("<br> contact frefrerence is $contact");
    ?>
</body> </html>