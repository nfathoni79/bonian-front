<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\Core\Configure;

class BadgeHelper extends Helper
{
    public function format($value)
    {
        $config = Configure::read('Point'); //contoh
        return '<span class="badge">' . $value . '</span>';
    }
}

