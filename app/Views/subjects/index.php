<?php

$tableBody = "";
foreach ($subjects as $subject) {
    $tableBody .= <<<HTML
            <tr>
                <td>{$subject->id}</td>
                <td>{$subject->name}</td>
                <td class='flex float-right'>
                    <form type='hidden' name='id' value='{$subject->id}'>
                        <button type='submit' name='btn-edit' title='Módosít'></button>
                    </form>
                    <form method='post' action='/subjects'>
                        <input type='hidden' name='id' value='{$subject->id}'>
                        <input type='hidden' name='_method' value='DELETE'>
                        <button type='submit' name='btn-del' title='Töröl'></button>
                    </form>
                </td>
            </tr>
            HTML;
}


$html = <<<HTML
        <table id='admin-subjects-table' class='admin-subjects-table'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tantárgy</th>
                    <th>
                        <form method='post' action='/subjects/create'>
                            <button type="submit" name='btn-plus' title='Új'>
                                <i class='fa fa-plus plus'>&nbsp;Új</button>
                        </form>
                    </th>
                </tr>
            </thead>
            <tbody>%s</tbody>
            <tfoot>
            </tfoot>
        </table>
        HTML;