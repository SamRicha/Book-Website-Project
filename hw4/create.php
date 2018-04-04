<?php include 'template/config.php'?> 
<?php include 'template/header.php'?>

<!-- Main Content -->
<?php
//postback4.php
// Form -> Form Handler -> Feedback
// Fill out registration, server processes stuff, get "accepted!" feedback.
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME,DB_PORT) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

if (isset($_POST['Name']))
{
    /*
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    die;
    */
    $message = process_post();
    $email = $_POST['Email'];
    //echo $myText;
    
    $to      = 'samuel.richardson@seattlecolleges.edu';
    $subject = 'Test Email';
    //$message = 'hello';
    $headers = 'From: http://edison.seattlecentral.edu/~sricha18/240/sandbox/postback4.php' . PHP_EOL .
        'Reply-To: ' . $email . PHP_EOL .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
    
    echo '<ul class="list-inline text-center">
    <p>Thank you for your information!</p>
    </ul>';
    
    
    
    
    
}
else
{
  // *** Show form. ***
  echo '<ul class="list-inline text-center">
    <form id="myForm" form action="/hw4/confirmation.php" method="POST" onsubmit="return validateForm()">
      
      <p>Name: <input type="text" autofocus name="name" required="required"></p>
      
      <p>Author: <input type="text" name="author" required="required"></p>
      
      <p>ISBN#: <input type="text" name="isbn"></p>
      
      <p>Genre: <select name="genre">
            <option value="Action">Action</option>
            <option value="Adventure">Adventure</option>
            <option value="Biography">Biography</option>
            <option value="Horror">Horror</option>
            <option value="Non-Fiction">Non-Fiction</option>
            <option value="Mystery">Mystery</option>
            <option value="Scifi">Scifi</option>
            <option value="Thriller">Thriller</option>
      </select>
      </p>
      
      <textarea id="description" name="description" placeholder="Fill in a description!" cols="30" rows="5"></textarea>
      
      <p><input type="submit" value="Add"></p>
      
    </form>
    
    
    </ul>
  ';
}



/*$name = $_POST['name'];

$author = $_POST['author'];

$genre = $_POST['genre'];

$isbn = $_POST['isbn'];

*/



?>

<?php include 'template/footer.php'?>