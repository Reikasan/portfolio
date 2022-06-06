<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

?>

<?php  require './vendor/autoload.php'; ?>


<?php 
    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $sender = $_POST['name'];
        $body = nl2br($_POST['comments']);

        /* CONFIGURE PHPMAILER */
        $mail = new PHPMailer(true);

        // server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
        $mail->isSMTP(true);                                         
        $mail->Host       = Config::SMTP_HOST;                  
        $mail->SMTPAuth   = true;                          
        $mail->Username   = Config::SMTP_USER;                     
        $mail->Password   = Config::SMTP_PASSWORD;                              
        $mail->SMTPSecure = 'tls';            
        $mail->Port       = Config::SMTP_PORT;   
        $mail->CharSet = "UTF-8";
        $mail->Encoding = 'base64';                                 

        //Recipients
        $mail->setFrom($email, $sender);
        $mail->addAddress(Config::RECIPIENT_ADDRESS, Config::RECIPIENT_NAME);  
        
        //Content
        $mail->isHTML(true);                                 
        $mail->Subject = 'Inquiry from Website';
        $mail->Body    = $body;
        
        if($mail->send()) {
            header("Location: index.php?thanks");
        } else {
            echo "couldn't send";
        }
        
    }

?>
<div id="confirmationModal">
    <div class="modal-container">
        <div class="clear">
        <i class="fas fa-times"></i>
        </div>
        <h1><?= CONFIRMATION; ?></h1>
        <form action="" method="post">
            <div class="controls">
                <input type="text" id="printName" class="contactInput" name="name" readonly>
                <label for="name" class="inputLabel">Name</label>
            </div>
            <div class="controls">
                <input type="email" id="printEmail" class="contactInput" name="email" readonly>
                <label for="email" class="inputLabel">Email</label>
            </div>
            <div class="controls">
                <textarea name="comments" id="printComments" class="contactInput" readonly></textarea>
                <label for="comments" class="inputLabel"><?= COMMENT; ?></label>
            </div>
            <div class="btn-container">
                <button type="button" id="clearBtn" class="clear"><?= BACK_TO_FORM; ?></button>
                <input type="submit" id="sendBtn" name="submit" value="<?= SUBMIT; ?>" class="submit">
            </div> 
        </form>
    </div>
</div>
