<?php 

include("inc/connection.php");

$status = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
}

if(empty($name) && empty($email) && empty($message)) {
    $status = "All fields are required.";
} elseif(strlen($name) < 1) {
    $status = "Please enter a valid name";
} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $status = "Please enter a valid email";
} elseif(strlen($message) < 1) {
    $status = "Please enter a message";
} else {
    try {
        $sql = 'INSERT INTO contact (name, email, message) VALUES (:name, :email, :message)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'email' => $email, 'message' => $message]);

        $status = "Contact form was successfully submitted, Thank you for your message!";
        $name = "";
        $email = "";
        $message = "";
    } catch(PDOException $e) {
        echo "Form failed to send: " . $e->getMessage();
    }    
}

?>

<?php include("inc/header.php") ?>

<div class="contact-section">
    <div class="contact-container">
        <div class="contact-card">
            <h1>Contact Us</h1>
            <form action="contact.php" method="POST" class="contact-form">
                <div >
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $name ?>">
                </div>

                <div >
                    <label for="name">Your Email</label>
                    <input type="text" id="email" name="email" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $email ?>">
                </div>

                <div >
                    <label for="name">Message</label>
                    <textarea type="text" id="message" name="message" ><?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $message ?></textarea>
                </div>

                <input type="submit" id="message_submit" value="Submit">

                <div class="form-status">
                    <span><?php echo $status; ?></span>
                </div>
            </form>  
        </div>
    </div>
</div>

<?php include("inc/newsletter.php") ?>
<?php include("inc/cookies-alert.php") ?>
<?php include("inc/footer.php") ?>