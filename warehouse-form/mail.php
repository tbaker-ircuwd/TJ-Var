<?php

        require_once("/home/scripts/PHPMailer/src/PHPMailer.php");
        require_once("/home/scripts/PHPMailer/src/Exception.php");
        require_once("/home/scripts/PHPMailer/src/SMTP.php");


        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        class eMail{

                private /* string */    $account;
                private /* string */    $password;
                private /* string */    $from;
                private /* string */    $from_name;
                private /* PHPMailer */ $mail;

                function __construct(){
                        $this->account = "reporting@ircuwd.com";
                        $this->password = "cfZ31U5HHNjYXX19vaqc";
                        $this->from = $this->account;
                        $this->from_name = "Automated Reporting";

                        $this->mail = new PHPMailer();
                        $this->mail->IsSMTP();
                        $this->mail->CharSet = "UTF-8";
                        $this->mail->Host = "smtp.office365.com";
                        $this->mail->SMTPAuth = true;
                        $this->mail->Port = 587;
                        $this->mail->Username = $this->account;
                        $this->mail->Password = $this->password;
                        $this->mail->SMTPSecure = "tls";
                        $this->mail->From = $this->from;
                        $this->mail->FromName = $this->from_name;
                        $this->mail->isHTML(true);
                }

                function to($to){
                        $this->mail->addAddress($to);
                }

                function body($body){
                        $this->mail->Body = $body;
                }

                function subject($subject){
                        $this->mail->Subject = $subject;
                }

                function addAttachment($fileName){
                        $this->mail->addAttachment($fileName);
                }

                function send(){
                        $this->mail->send();
                        if($this->mail->ErrorInfo != ""){
                                echo $this->mail->ErrorInfo;
                        }
                }

        }

?>

