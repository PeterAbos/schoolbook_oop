<?php

$html = <<<HTML
        <form method='post' action='/classes'>
            <input type='hidden' name='_method' value='PATCH'>
            <input type='hidden' name="id" value="{$class->id}">
            <fieldset>
                <label for="classes">Osztály</label>
                <input type="text" name="code" id="code" value="{$class->code}">
                <input type="text" name="year" id="year" value="{$class->year}">
                <hr>
                <button type="submit" name="btn-update"><i class="fa fa-save">                    
                    </i>&nbsp;Mentés
                </button>
                <a href="/classes"><i class="fa fa-cancel"></i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
        HTML;

echo $html;