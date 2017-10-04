<?php

$error = "";

$successMessage = "";

if ($_POST) {
    
    
    if (!$_POST['email']) {
        
        $error .= "* The email address field is required.<br>";
        
    }
    
     if (!$_POST['subject']) {
        
        $error .= "* The subject field is required.<br>";
        
    }
     if (!$_POST['content']) {
        
        $error .= "* The content field is required.<br>";
        
    }

    if ($_POST['email'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
    $error .= "* The email address is not valid.<br>";
    }
    
    if ($error != "") {
        
        $error = '<div class="alert alert-danger" role="alert"><p><strong>Oh oh!</strong></p>' .$error. '</div>';
        
    } else {
        
        $emailTo = "renev88@gmail.com";
        
        $subject = $_POST['subject'];
        
        $content = $_POST['content'];
        
        $headers = "From: ".$_POST['email'];
        
        if (mail($emailTo, $subject, $content, $headers)) {
            
            $successMessage = '<div class="alert alert-success" role="alert"><p><strong>Well done!</strong></p>Message sent correctly. :)</div>';
            
        } else {
            
            $error = '<div class="alert alert-danger" role="alert"><p><strong>Oh oh!</strong></p>Your message couldn\'t be sent. Please try again later.</div>';
            
        }
        
    }
}

?>