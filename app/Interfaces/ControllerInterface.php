<?php

namespace App\Interfaces;

class ControllerInterface 
{
    function index();
    function show(int $id);
    function create();
    function save(array $data);
    function edit(int $id);
    function update(int $id, array $data);
    function delete(int $id);
}