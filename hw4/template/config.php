<?php
/*
config.php - stores application configuration info
last updated 03/13/2018
*/
//database credentials
include 'credentials.php';
//if true, allows us to see all error messages while developing
define('DEBUG',TRUE);

//database credentials
//include 'credentials.php';

//Allows the current page to know it's own name
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//here are our page links:
$nav1["/hw4/index.php"] = "Home";
$nav1["/hw4/create.php"] = "Create";
$nav1["/hw4/forward.php"] = "Forward";
$nav1["/hw4/list.php"] = "List";

//default banner data


switch(THIS_PAGE)
{
    case "index.php":
        $title = "Home";
        $banner = "Home";
    break;
    
    case "create.php":
        $title = "Create";
        $banner = "Create";
    break;

    case "confirmation.php":
        $title = "Confirmation";
        $banner = "Confirmation";
    break;
        
     case "forward.php":
        $title = "Forward";
        $banner = "Forward";
    break;
        
    case "list.php":
        $title = "List";
        $banner = "List";
    break;
}

/*
This function creates the navigation by looping an associative array  
and places class="active" on the current page
*/
function makeLinks($nav){
    $myReturn = '';
    
    foreach($nav as $page => $text)
    {
       
        if(THIS_PAGE == $page)
        {
            $myReturn .= '
            <li class="active">
              <a href="' . $page . '">' . $text . '</a>
           </li>
           ';
        }else{
            $myReturn .= '
            <li>
              <a href="' . $page . '">' . $text . '</a>
           </li>
           ';
        }
    }
    
  return $myReturn;
}

/*
This function allows us to only show errors to developers while 
building the site, and to hide error messages from users.
*/
function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
		echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
		die();
    }
}






