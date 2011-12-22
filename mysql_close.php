<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DATTWOOD
 * Date: 22/09/11
 * Time: 08:45
 * Close all mysql connections
 */
$mysqli->close();

mysql_close($link2);

mssql_close($link);


?>