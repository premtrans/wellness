<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "ahooks@premiertransportation.com";
    $email_subject = "FoodLog";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['id']) ||
        !isset($_POST['breakfast']) ||
        !isset($_POST['lunch']) ||
        !isset($_POST['dinner']) ||
        !isset($_POST['snacks']) ||
        !isset($_POST['unhealthy']) ||
        !isset($_POST['healthy'])||
        !isset($_POST['change'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $id = $_POST['id']; // required
    $breakfast = $_POST['breakfast']; // required
    $lunch = $_POST['lunch']; // required
    $dinner = $_POST['dinner']; // required
    $snacks =$_POST['snacks']; // required
    $calories =$_POST['calories']; // not required
    $unhealthy =$_POST['unhealthy']; //required
    $healthy =$_POST['healthy']; // required
    $change =$_POST['change']; //required
 
    
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The  Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$id)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "ID: ".clean_string($id)."\n";
    $email_message .= "Day1: ".clean_string($day1)."\n";
     $email_message .= "Day2: ".clean_string($day2)."\n";
      $email_message .= "Day3: ".clean_string($day3)."\n";
     $email_message .= "Day4: ".clean_string($day4)."\n";
      $email_message .= "Day5: ".clean_string($day5)."\n";
     $email_message .= "Unhealthy: ".clean_string($healthy)."\n";
     $email_message .= "Modify: ".clean_string($modify)."\n";
    $email_message .= "Healthy: ".clean_string($day1)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Your food log has been submitted. 
 
<?php
 
}
?>