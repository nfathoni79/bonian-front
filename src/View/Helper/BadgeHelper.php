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
                'max' => 500
            ],
            'blue' => [
                'min' => 501,
                'max' => 1500
            ],
            'gold' => [
                'min' => 1501,
                'max' => 3000
            ],
            'diamond' => [
                'min' => 3001,
                'max' => 10000
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

