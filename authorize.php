<?php
    $accountSid = $_GET['AccountSid'];
    $id = "";

    // store $accountSid value in database
    // associated with a user in your application
    $host = "ec2-54-235-192-45.compute-1.amazonaws.com"; 
    $user = "tdyqrgijyseefo"; 
    $pass = "JvAJsxsFD9TC5jQpLq5eWo9Tfk"; 
    $db = "d53m4i2ddtambf"; 

    $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
                       or die ("Could not connect to server\n"); 
    
    $query = "SELECT * FROM business";   
    $rs1 = pg_query($con, $query) or die("Cannot execute query: $query\n");
    $totalBusinesses = count($rs);

    $query = "INSERT INTO business VALUES (".$totalBusinesses.", '.$accountSid.')";
    $rs2 = pg_query($con, $query) or die("Cannot execute insert: $query\n"); 
    
    $id = $id.$totalBusiness; 
    pg_close($con);  

    // redirect back to my app when done
    $location = "Location: http://sd-leadtracker.herokuapp.com/myapp.php?id=";
    $location = $location.$id; 
    header(location);
?>