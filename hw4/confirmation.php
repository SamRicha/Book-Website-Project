<?php include 'template/config.php'?> 
<?php include 'template/header.php'?>    
<!-- Main Content -->

<script>
    setTimeout(function () {
   window.location.href= 'list.php'; // the redirect goes here

},9000); 
</script>
<?php

$name = $_POST['name'];

$author = $_POST['author'];

$genre = $_POST['genre'];

$isbn = $_POST['isbn'];

$description = htmlspecialchars($_POST['description']);

$sql = "INSERT INTO book (name, author, genre, isbn, description) 

                               VALUES ('$name', '$author', '$genre', '$isbn', '$description') ";

$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME,DB_PORT) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));

 
?>

<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-preview">
                    <h2 class="post-title">
                            Book Added
                        </h2>
                        <h3 class="post-subtitle">
                            Name: <?php echo "$name" ?>
                        </h3>
                    <h3 class="post-subtitle">
                            Author: <?php echo "$author" ?>
                        </h3>
                    <h3 class="post-subtitle">
                            Genre: <?php echo "$genre" ?>
                        </h3>
                    <h3 class="post-subtitle">
                            ISBN#: <?php echo "$isbn" ?>
                        </h3>
                    <h3 class="post-subtitle">
                            Description: <?php echo "$description" ?>
                        </h3>
                    
                </div>

            </div>
        </div>
    </div>

<?php
@mysqli_free_result($result); #releases web server memory
@mysqli_close($iConn); #close connection to database
 include 'template/footer.php'?>