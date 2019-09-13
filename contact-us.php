<?php
$sActive= 'contact-us';
$sPageTitle = 'Contact Us';
require_once(__DIR__.'/components/top.php');

?>

<div id="emailContainer">
<h2>Have questions or comments?</h2>
<h2>Send us a line!</h2>
<form action="" id="sendEmail" method="POST">
    <div class="error hidden">You must be logged in to send us a message.  <a href="login.php">Go to login page</a></div>
    <label for="">Email Subject
        <input type="text" maxlength="50" name="emailSubject" required placeholder="Your subject ">
        <div class="requirements">Email must contain a subject</div>
    </label>
    <label for="">Email body
    <textarea rows="4" cols="50" maxlength="5000" class="emailBody" name="emailBody" required placeholder="Your comments or questions"></textarea>
    <div class="requirements">Email must contain bodytext</div>    
</label>
    <button id="btnSendEmail" disabled>Send</button>

</form>
</div>


<script src="js/send-email.js"></script>
<script src="js/validate.js"></script>
</body>
</html>