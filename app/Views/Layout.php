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

    private static function handleMessage(): void
    {
        $message = [
            'success_message' => 'success',
        ];
    }

    public static function navbar() {
        echo <<<HTML
        <nav class="navbar">
            <ul class="nav-list">
                <li class="nav-button"><a href="/"><button style="button" title="Kezdőlap"></button></li>
                <li class="nav-button"><a href="/subjects"><button style="button" title="Tantárgyak"></button></li>
            </ul>
        </nav>
        HTML;
    }

    public static function footer() {
        echo <<<HTML
        </div>
            <footer>
                <hr>
                <p>2025 &copy; Abos Péter</p>
            </footer>
        </body>
        </html>
        HTML;
    }
}