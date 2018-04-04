<?php include 'template/config.php'?>
<?php include 'template/header.php'?>
<style>
    h3{
      
        padding-left:150px
    }
    p{
       
        padding-left:200px
    }
    
</style>
<h3>Books</h3>
<?php 

$sql = "select * from book";

$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME,DB_PORT) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
if (mysqli_num_rows($result) > 0)//at least one record!
{//show results
	while ($row = mysqli_fetch_assoc($result))
    {
	   echo "<p>";
	   //echo "Destination: <b>" . $row['destination'] . "</b><br />";
	   echo "Book Name: <b>" . $row['name'] . "</b>, Author: <b>" . $row['author'] . "</b>, Genre: <b>" . $row['genre'] . "</b>, ISBN# <b>" . $row['isbn'] . "</b><br />";
	   echo "Description: " . $row['description'] . "</p>";
    
    }
}
else{//no records
	echo '<div align="center">What! No books?  There must be a mistake!!</div>';
}

@mysqli_free_result($result); #releases web server memory
@mysqli_close($iConn); #close connection to database
?>
<?php include 'template/footer.php'?>


