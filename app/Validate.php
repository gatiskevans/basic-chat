<?php

namespace App;

class Validate
{
    public function checkIfEmpty(string $nickname, string $message): bool
    {
        if ($_POST[$nickname] === '' && $_POST[$message] === '') {
            echo "<b class='error'>Nickname and message cannot be empty!</b><br><br>";
            return false;
        }
        if ($_POST[$nickname] === '') {
            echo "<b class='error'>Nickname cannot be empty!</b><br><br>";
            return false;
        }
        if ($_POST[$message] === '') {
            echo "<b class='error'>Message cannot be empty!</b><br><br>";
            return false;
        }
        return true;
    }
}