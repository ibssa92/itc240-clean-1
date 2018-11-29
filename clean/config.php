<?php
/*
    config.php
    
    Stores configuration data for our application
*/
ob_start(); //prevents header errors

define('DEBUG',TRUE); #we want to see all errors

include 'credentials.php'; //database credentials
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//here are the urls and page names for our main navigation. need this for the makeLinks() function to work
$nav1['index.php'] = 'Home';
$nav1['db-test.php'] = 'Database';
$nav1['jordan_list.php'] = 'Jordans';
$nav1['daily.php'] = 'Daily';
$nav1['reservations.php'] = 'Reservations';
$nav1['contact.php'] = 'Contact';


//echo 'the constant is storing: ' . THIS_PAGE;

//die;

//default page values
$title = THIS_PAGE;
$siteName = 'Clean Application';
$slogan = 'Whatever it is you do, we do it better.';
$pageHeader = 'The developer forgot to put a pageHeader!';
$subHeader = 'insert subHeader!';

switch(THIS_PAGE) {
        
    case 'index.php':
        $title = 'My home page';
        $pageHeader = 'Welcome to Coffee Lovers';
        $subHeader = 'Put more info about page here';
    break;
        
    case 'customer_list.php':
        $title = 'A list of customers';
        $pageHeader = 'Our customers';
        $subHeader = 'Don\'t sue us, because we\'re using celebrity photos!';
    break;
        
    case 'jordan_list.php':
        $title = 'A list of the Greatest Jordans ';
        $pageHeader = 'Greatest Jordans Ever';
        $subHeader = 'Don\'t sue us, because we\'re using jordan photos!';
    break;
        
    case 'db-test.php':
        $title = 'A database test page';
        $pageHeader = 'Database Test Page';
        $subHeader = 'Check this page to see if you db credentials are correct';
    break;
        
    case 'daily.php':
        $title = 'My daily page';
        $pageHeader = 'Daily coffee specials';
        $subHeader = 'All our coffee is special';
    break;
        
    case 'reservations.php':
        $title = 'My reservations page';
        $pageHeader = 'Make your Reservation';
        $subHeader = 'All our coffee is special';
    break;
        
    case 'contact.php':
        $title = 'My contact page';
        $pageHeader = 'Please contact us';
        $subHeader = 'We appreciate your feedback';
    break;
    
        
}

// end of switch


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

/*
makeLinks() will create navigation items from an array

echo makeLinks($nav1);

*/
function makeLinks($nav)
{
    $myReturn = '';
    foreach($nav as $key => $value){
        
        if(THIS_PAGE == $key)
        {// current page, add ACTIVE class
        $myReturn .='
        <li class="nav-item">
        <a class="nav-link active" href="' . $key . '">' . $value . '</a>
        </li>'; 
            
        }else{// add no formatting
        $myReturn .='
        <li class="nav-item">
        <a class="nav-link" href="' . $key . '">' . $value . '</a>
        </li>';    
            
        }
 
    }
    
    return $myReturn;
    
    
}//end makeLinks

