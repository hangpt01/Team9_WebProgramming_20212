<?php
$colors = array('black' => '#000000' ,
                'white' => '#ffffff',
                'red' => '#ff0000',
                'blue' => '#0000ff');

$bg_name = $_POST['background'];
$fg_name = $_POST['foreground'];

session_start();
$_SESSION['fg'] = $colors[$fg_name];
$_SESSION['bg'] = $colors[$bg_name];
?>
<html>
    <head><title>Preferences Set</title></head>
    <body>
        Thank you. Your preferences have been changed to: <br/>
        Background: <?= $bg_name?><br/>
        Foreground: <?= $fg_name?><br/>

        Click <a href="prefs-demo.php">here</a> to see the preferences in action.
    </body>
</html>