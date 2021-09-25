<?php

    require_once 'vendor/autoload.php';
    require_once 'app/Dump.php';
    use App\DataHandler;

    $chatData = new DataHandler('data/chat.csv');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Basic Chat</title>
</head>
<body>

<?php
    foreach($chatData->getCsv()->getRecords() as $records){
        foreach($records as $record){
            dd($record);
        }
    }
    $chatData->writeIntoFile("janis", "cau ka tev iet");
?>

</body>
</html>
