<?php include 'config.php'?>
<?php include 'header.php'?>
<?php
if(isset($_POST['Name'])){// show data
    //echo $_POST['FirstName'];
    
    /*echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    die;
    */
        
    $to      = 'ibssa.wado@seattlecentral.edu';
    $subject = 'Clean Reservations Page';
    //$message = 'hello from ' . $_POST['Name'];
    $message = process_post();
    $replyTo = 'ibssa92@gmail.com';
    $headers = 'From: noreply@ibssawado.com' . PHP_EOL .
        'Reply-To: ' . $replyTo . PHP_EOL .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
    echo '<p>Thanks for your reservation with us!</p>
            <p><a href="">BACK</a></p>';
    
}else{// show form
    echo '
           <form action="" method="post" name="sentMessage" id="contactForm" novalidate>
          
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" name="Name" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" id="email" name="Email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
           
            
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Reservation Times</label>
                <ul>
                    <li>
                <input type="radio" class="form-control" name="time" value="seven"> 7pm
                    </li>
                    <li>
                <input type="radio" class="form-control" name="time" value="eight"> 8pm
                    </li>
                </ul>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            

        <div class="control-group">
        <div class="form-group floating-label-form-group controls">
        <label>Reservation Date</label>
        <ul>
        <li>
        <input type="checkbox" class="form-control" name="date" value="june3"> June 3rd
        </li>
        <li>
        <input type="checkbox" class="form-control" name="date" value="june4"> June 4th
        </li>
        <li>
        <input type="checkbox" class="form-control" name="date" value="june5"> June 5th
        </li>
        </ul>
            <p class="help-block text-danger"></p>
              </div>
            </div>
            
            
            
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <textarea rows="5" class="form-control" placeholder="Message" id="message" name="Message" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
            </div>
          </form>
    ';
}

?>
<?php include 'footer.php';

function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         }
    }
    return $myReturn;
}


?>

































