<?php

namespace App;

class Validate
{
    public function checkIfEmpty(string $nickname, string $message): bool
    {
        if ($_POST[$nickname] === '' || $_POST[$message] === '') {
            return false;
        }
        return true;
    }
}