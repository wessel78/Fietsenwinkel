<?php
function sendEmail($email){
    $to = $email;

    $subject = 'Bedankt voor uw aankoop bij Fietswinkel.nl';

    $message = 'test';

    $headers = 'From: info@pieperserver.nl' . "\r\n" .

        'Reply-To: info@pieperserver.nl' . "\r\n" .

        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

}

?>