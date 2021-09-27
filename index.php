<?php

    require_once 'vendor/autoload.php';
    require_once 'app/Isset.php';

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

    <p id="title"><b>ChatBox</b></p>

<?php

    if(isset($_POST['submit'])){
        if($validate->checkIfEmpty('nickname', 'message')) {
            $chatData->writeIntoFile($_POST['nickname'], $_POST['message']);
        }
        header("Location: /");
    }

    $chatData->statement();

?>

    <form action="/" method="post" class="chatbox">
        <label for="nickname" class="nicknameLabel"><b>Nickname:</b> </label><br>
        <input type="text" id="nickname" name="nickname"><br><br>
        <label for="textMessage" class="messageLabel"><b>Message:</b> </label><br>
        <textarea id="textMessage" name="message" placeholder="Enter the message" rows="4" cols="35"></textarea><br><br>
        <input type="submit" name="submit" class="submit" value="Send message">
    </form>

</div>

</body>
</html>