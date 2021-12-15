        <?php

        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];

         $to = "fitohm2020@gmail.com";
         $subject = "Enquiry from ".$name;
         
         $message = "<b>".$subject."</b>";
         $message .= "<h1>This is headline.</h1>";
         
         $header = "From:".$email." \r\n";
         //$header .= "Cc:afgh@somedomain.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
      ?>