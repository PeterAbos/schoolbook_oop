<?php

namespace App\Views;

class Layout
{
    public static function header($title = "Iskola") {
        echo <<<HTML 
        <!DOCTYPE html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>$title</title>
        </head>
        <body>
        HTML;
        self::navbar();
        self::handleMessage();
        echo '<div class="container">';
    }
}