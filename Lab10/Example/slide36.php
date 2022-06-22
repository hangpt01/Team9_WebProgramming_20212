<?php

header("Content-Type: text/xml");
echo "<?xml version=\"1.0\"?>\n";
echo "<names>\n";
if (!$query)
    $query = strtoupper($_GET['query']);
if ($query != "") {
    include_once('db_access.php');
    $connection = mysql_connect($db_host, $db_username, $db_password);
    if (!$connection) {
        exit("Could not connect to the database: <br/>" . htmlspecialchars(mysql_error));
    }
    mysql_select_db($db_database);
    $select = "SELECT ";
    $column = "name ";
    $from = "FROM ";
    $tables = "people ";
    $where = "WHERE ";
    $condition = "upper(name) LIKE '%$query%'";
    $SQL_query = htmlentities($select . $column . $from . $tables . $where . $condition);
    $result = mysql_query($SQL_query);
    while ($row = mysql_fetch_row($result)) {
        echo "<name>" . $row[0] . "</name>\n";
    }
    mysql_close($connection);
}
echo "</names>";
?>