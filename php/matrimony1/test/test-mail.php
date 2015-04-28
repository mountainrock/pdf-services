<?

        $mailto="sandeep.maloth@gmail.com";
        $file="test-mail.php";
        $subject = "Mail from Enquiry Form - ".date('Y');
        $from="support@gorbanjara.net";
        $message_body="test message";
        
        mail($mailto,$subject,$message_body,"From:".$from);
        include("$file");
        
        ?>