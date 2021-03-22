<?php
include 'DataLayer.php';
//test

$datalayer = new DataLayer();
$datalayer::get();


if(isset($_POST)){
    $data = $_POST;
}

//save the email in the database.

    //if data is download button|| DOWNLOAD FILE

    if ($_POST['PostName'] == "DownLoadCV"){
        // We'll be outputting a PDF
        header('Content-type: application/pdf/doc/docx');
        // It will be called downloaded.pdf
        header('Content-Disposition: attachment; filename="RakheoanaLefelaCV.pdf"');
        // The PDF source is in original.pdf
        readfile('assets/files/RakheoanaLefelaCV.pdf');
        }else if ($_POST['PostName'] == "ContactForm")
        {
          $datalayer = new DataLayer();
          $datalayer::post( $data);

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: Rakheoana <info@ngpm.co.za>' . "\r\n" .
            'Reply-To: donotreply@ngpm.co.za' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            //SEND EMAIL TO THE PERSON MAKING CONTACT
            if (isset($_POST["email"])){
            $to = $_POST["email"];
            }
            $subject = "Your contact request has been recieved";
            if(isset($_POST["message"])){

            $msg = "Dear " .$_POST["name"]. "\r\n" .   
            "    
            I am delighted that you made contact with me, i will respond to this
            \r\n 
            request tonight when i check my private emails.
            \r\n
            \r\n
            Kind regards.
            ";
            }
            $msg = wordwrap($msg,70);
            mail($to,$subject,$msg,$headers);

        // send to myself
        $from = $_POST["email"]; 
        $message = "Contact new contact on your site :" . $from;
        $message = wordwrap($message,70);
        mail("rakgew@gmail.com",$subject,$message,$headers);
        
        Header("Location: ");
}

?>





