<?php

namespace App\Views;

class View
{
    public static function render(string $view, array $data = [], bool $useLayout) 
    {
        $viewFile = self::resolveViewPath($view);

        if (!file_exists($viewFile)) {
            self::handleMissingView($viewFile);
            return;
        }

        if ($useLayout) {
            Layout::header($data['title'] ?? 'Iskola');
        }

        extract($data);
        include($viewFile);
    }
}