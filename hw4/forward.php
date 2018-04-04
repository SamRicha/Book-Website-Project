<?php include 'template/config.php'?> 
<?php include 'template/header.php'?>    
<!-- Main Content -->

<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-preview">

                            <form name="myForm" method="GET" action="/hw4/forward.php">
                                <select name="book">
                                    <option disabled selected value> -- select an option -- </option>
                                    <option value="9780679400219">African Silences</option>
                                    <option value="9780871089151">Cogan's Woods</option>
                                    <option value="9781520534152">Manifesto of the Communist Party</option>
                                    <option value="9781407054056">Manufacturing Consent</option>
                                </select>
                                <input type="submit"></input>

                            </form>


<?php

$bookSearchTerm =$_GET['book'];

//initialize
$ch = curl_init();

//curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/books/v1/volumes?q=isbn:". $bookSearchTerm);

$data = curl_exec($ch);

//curl_close($ch);

$json_output = json_decode($data);


$url = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=isbn:" . $bookSearchTerm . "&key=AIzaSyDf4ELfciwyRaTiANul5l7XCuGFUzfwPe8");

$data = json_decode($url, true);

echo "<p>Title = " . $data['items'][0]['volumeInfo']['title'] . "</p>";

echo "<p>Authors = " . @implode(",", $data['items'][0]['volumeInfo']['authors']) . "</p>";  

echo "<p>Pagecount = " . $data['items'][0]['volumeInfo']['pageCount'] . "</p>

                </div>
            </div>
        </div>
</div>";


include 'template/footer.php';
?>