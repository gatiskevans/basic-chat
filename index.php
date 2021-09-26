<?php

    require_once 'vendor/autoload.php';
    require_once 'app/Isset.php';
    require_once 'app/Dump.php';

    use App\DataHandler;
    use App\Validate;

    $chatData = new DataHandler('data/chat.csv');
    $validate = new Validate();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Basic Chat</title>
</head>
<body>

<div id="main">

<?php
    if(isset($_POST['submit'])){
        if($validate->checkIfEmpty('nickname', 'message')) {
            $chatData->writeIntoFile($_POST['nickname'], $_POST['message']);
        }
    }
    $chatData->statement();
?>

    <form action="<?php header("/") ?>" method="post" class="chatbox">
        <label for="nickname" class="nicknameLabel"><b>Nickname:</b> </label>
        <input type="text" id="nickname" name="nickname" value="<?= $_POST['nickname'] ?>"><br><br>
        <label for="message" class="messageLabel"><b>Message:</b> </label>
        <textarea id="message" name="message" placeholder="Enter the message" rows="4" cols="35"></textarea><br><br>
        <input type="submit" name="submit" class="submit">
    </form>

</div>

</body>
</html>
