<html>
 <head>
        <title>ATN shop</title>
</head>
<body>
<?php
    include("config.php");
    $pg_conn = pg_connect($conn_string);
    $result = pg_query($pg_conn,"select * from product");
    $numrows = pg_num_rows($result)
?>
<table border="1">
<tr>
<th>productid</th>
<th>productname</th>
<th>productprice</th>
<th>productquantity</th>
</tr>
<?php
    for($row_index = 0; $row_index<$numrows; $row_index++)
    {
        echo "<tr>\n";
        $row = pg_fetch_array($result, $row_index);
        echo "<td>", $row["productid"], "</td><td>",
                     $row["productname"], "</td><td>",
                     $row["productprice"], "</td><td>",
                     $row["productquantity"], "</td><tr>",
    }
    pg_close();
?>
</table>
</body>
</html>