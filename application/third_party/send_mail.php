<?php
    $mail_content  = $argv;
      /*echo $mail_content[1];
      echo "\n";
      echo $mail_content[2];
      echo "\n";
      echo $mail_content[3];
      echo "\n";
      echo $mail_content[4];
      echo "\n";
      echo $mail_content[5];
      echo "\n";
      echo $mail_content[6];
      echo "\n";
      exit();*/
    if( isset( $mail_content[1] ) && isset( $mail_content[2] ) && isset( $mail_content[3] ) && isset( $mail_content[4] ) && isset( $mail_content[5] ) && isset( $mail_content[6] ) && isset( $mail_content[7] ) && isset( $mail_content[8] ) && isset( $mail_content[9] ) )
    {
      include("class.phpmailer.php");
      include("class.smtp.php");
      //$bccmails = array("examble@mail.com");
      $mail   = new PHPMailer; 
      $mail->IsSMTP(); 
      $mail->SMTPSecure = $mail_content[1];
      $mail->Host = $mail_content[2];
      $mail->Port = $mail_content[3]; //465 or 587
      $mail->SMTPAuth = true; 
      $mail->Username = $mail_content[4]; 
      $mail->Password = $mail_content[5]; 
      $mail->SetFrom($mail_content[6]);
      $mail->Subject = $mail_content[7];
      $mail->Body = $mail_content[8];
      $mail->AddAddress( $mail_content[9] ); 
      $mail->IsHTML(TRUE);
      $mail->SMTPDebug  = 0;
      $send = $mail->Send();
     /* if($send)
      {
         echo "Success.";
      }
      else
      {
          echo $mail->ErrorInfo;
      }*/
    }
?>