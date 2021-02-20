<?php
function validate_email($email){
    if (!isset($email)) {
      return false;
    }
    if (strlen(trim($email)) < 6) {
      return false;
    }
    if (!strpos($email, '@')) {
      return false;
    }
    if (!strpos($email, '.')) {
      return false;
    }
    return true;
  }



function mail_sender_contact($post_from, $sub, $mess){
  $to = "banas.martin1181@gmail.com";
  $subject = $sub;
  $message = $mess;
  $headers = "From: The Sender Name <".$post_from.">\n";
  $headers .= "Reply-To: ".$post_from."\n";
  $headers .= "Content-type: text/html\n";

  mail($to, $subject, $message, $headers);
}



function mail_sender($post_to){
  $to = $post_to;
  $subject = 'This is test e-mail';
  $message = 'Hello. This is only test e-mail. Please ignor it.';
  $headers = "From: banas.martin1181@gmail.com";

  mail($to, $subject, $message, $headers);
}



function validate_name($name){
  if (strlen(trim($name)) >2 ) {
    return true;
  }
  return false;
}

function validate_zip($name){
  if (!isset($name)) {
    return false;
  }
  if (!is_numeric($name)) {
    return false;
  }
  return true;
}

function validate_name_must($name){
  if (!isset($name)) {
    return false;
  }
  if (!strlen(trim($name)) >2 ) {
    return false;
  }
  return true;
}

function validate_phone($name){
  if (!isset($name)) {
    return false;
  }
  if (!strlen(trim($name)) >2 ) {
    return false;
  }
  if (!is_numeric($name)) {
    return false;
  }
  return true;
}


                        /* Pravdepodobne nefunkcne */
function mail_sender_order($f_name, $l_name, $c_name, $adress, $state, $zip, $email, $phone, $message){
  $to = "banas.martin1181@gmail.com";
  $subject = "Invoice"; //faktura
  $message .= "First name: <".$f_name.">\n";
  $message .= "Last name: <".$l_name.">\n";
  $message .= "Company name: <".$c_name.">\n";
  $message .= "Adress: <".$adress.">\n";
  $message .= "State: <".$state.">\n";
  $message .= "Zip: <".$zip.">\n";
  $message .= "Email: <".$email.">\n";
  $message .= "Phone: <".$phone.">\n";
  $message .= "Message: <".$message.">\n";
  $headers .= "Content-type: text/html\n";

  mail($to, $subject, $message, $headers);
}

?>