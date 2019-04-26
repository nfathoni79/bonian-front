<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\Core\Configure;

class BadgeHelper extends Helper
{
    public function format($value)
    {
        $badges = [
            'silver' => [
                'min' => 1,
                'max' => 30
            ],
            'blue' => [
                'min' => 31,
                'max' => 50
            ],
            'gold' => [
                'min' => 51,
                'max' => 100
            ],
            'diamond' => [
                'min' => 101,
                'max' => 5000
            ],
        ];
        $badge = '';
        foreach($badges as $key => $vals){
            if(($value >= $vals['min']) && ($value <= $vals['max'])){
                $badge = $key;
                break;
            }
        }
        return 'u-bg--badge__'.$badge;
    }
}

