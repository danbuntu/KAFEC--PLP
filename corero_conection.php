<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$server = 'xx.x.xxx.xx';

$link = mssql_connect($server, 'xxx', 'xxx');


if (!$link) {
    die('something went wrong with the connecting to Correo mssql database');
}


//select the database to use
//$select = mssql_select_db('NGReports');
$select = mssql_select_db('NG');

?>
