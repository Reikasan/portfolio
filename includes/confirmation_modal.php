<?php 
    if(isset($_POST['submit'])) {
        $toWebmailer = "info@reikaakuzawa.com";
        $subject = "Inquiery from Website";
        $body = "Name: " .$_POST['name'];
        $body .= "Comments: " .$_POST['comments'];
        $body = str_replace("\n.", "\n..", $body);
        $body = wordwrap($body, 70, "\r\n");
        $header = "From: " .$_POST['email'];

        mail($toWebmailer, $subject, $body, $header);

        header("Location: index.php?thanks");
    }

?>
<div id="confirmationModal">
    <div class="modal-container">
        <div class="clear">
        <i class="fas fa-times"></i>
        </div>
        <h1>Confirmation</h1>
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
                <label for="comments" class="inputLabel">Comments</label>
            </div>
            <div class="btn-container">
                <button type="button" id="clearBtn" class="clear">Back to Form</button>
                <input type="submit" id="sendtBtn" name="submit" value="Send" class="submit">
            </div> 
        </form>
    </div>
</div>