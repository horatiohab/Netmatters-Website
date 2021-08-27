<?php 

include("inc/connection.php");

$successMessage = "";
$nameClass = $emailClass = $messageClass = "";
$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";
$nameSuccess = $emailSuccess = $messageSuccess = false;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = test_input($_POST['name']);
    $email = test_input($_POST['email']);
    $message = test_input($_POST['message']);

    if (strlen($name) < 1) {
        $nameErr = "Please enter a valid name";
        $nameClass = "invalid-input";
        $nameSuccess = false;
    } else {
        $nameSuccess = true;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Please enter a valid email";
        $emailClass = "invalid-input";
        $emailSuccess = false;
    } else {
        $emailSuccess = true;
    }

    if (empty($_POST["message"])) {
        $messageErr = "Please enter the message you would like to send.";
        $messageClass = "invalid-input";
        $messageSuccess = false;
    } else {
        $messageSuccess = true;
    }

    if ($nameSuccess && $emailSuccess && $messageSuccess) {
        try {
            $sql = 'INSERT INTO contact (name, email, message) VALUES (:name, :email, :message)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['name' => $name, 'email' => $email, 'message' => $message]);
    
            $successMessage = "Contact form was successfully submitted, Thank you for your message!";
            $name = "";
            $email = "";
            $message = "";
        } catch(PDOException $e) {
            echo "Form failed to send: " . $e->getMessage();
        }  
    }
}

?>

<?php include("inc/header.php") ?>

<div class="contact-section">
    <div class="contact-container">
        <div class="contact-card">
            <h1>Contact Us</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="contact-form">
                <div >
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $name ?>" class="<?php echo $nameClass ?>">
                </div>

                <div >
                    <label for="name">Your Email</label>
                    <input type="text" id="email" name="email" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $email ?>" class="<?php echo $emailClass ?>">
                </div>

                <div >
                    <label for="name">Message</label>
                    <textarea type="text" id="message" name="message" class="<?php echo $messageClass ?>"><?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $message ?></textarea>
                </div>

                <input type="submit" id="message_submit" value="Submit">

                <div class="form-status">
                    <span><?php echo $successMessage; ?></span>
                    <span><?php echo $nameErr; ?></span>
                    <span><?php echo $emailErr; ?></span>
                    <span><?php echo $messageErr; ?></span>
                </div>
            </form>  
        </div>
    </div>
</div>

<?php include("inc/newsletter.php") ?>
<?php include("inc/cookies-alert.php") ?>
<?php include("inc/footer.php") ?>