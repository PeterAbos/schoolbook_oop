<?php

namespace App\Models;

class ClassModel extends Model
{
    public int|null $year = null;
    public string|null $code = null;

    protected static $table = 'classes';

    public function __construct(?int $year = null, ?string $code = null)
    {
        parent::__construct();
        if ($year) {
            $this->year = $year;
        }
        if ($code) {
            $this->code = $code;
        }
    }
}