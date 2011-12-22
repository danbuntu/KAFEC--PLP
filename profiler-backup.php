 <?php
 // connect to a DSN "myDSN"
$conn = odbc_connect('s-profiler', 'sa', 'r3sult5');
echo '<h3>username name select </h3>';
    // the SQL statement that will query the database
    // select the yyul_login_id based on site login name
    // Uses the join statement to join together the two revelent tables
    $query = "SELECT * FROM dbo.users WHERE EnrolmentNo='$id'";
     // perform the query
    $result = odbc_exec($conn, $query);
    
     echo "<table border=\"1\"><tr>";
    
     // print field name
    $colName = odbc_num_fields($result);
     for ($j = 1; $j <= $colName; $j++)
     {
        echo "<th>";
         echo odbc_field_name ($result, $j);
         echo "</th>";
         } 
    
    // fetch tha data from the database
    while (odbc_fetch_row($result))
     {
        echo "<tr>";
         for($i = 1;$i <= odbc_num_fields($result);$i++)
         {
            echo "<td>";
             echo odbc_result($result, $i);
             echo "</td>";
             } 
        echo "</tr>";
         } 
    echo "</td> </tr>";
     echo "</table >";
     echo 'exploded table';
     echo $conn;
     echo '<br />';
     echo $query;
     echo '<br />';
    
    ?>