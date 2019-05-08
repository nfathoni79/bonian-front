<?php

namespace App\View\Helper;

use Cake\View\Helper;

class ToolsHelper extends Helper
{
    public function highlight($text, $words, $classAttribute = 'search-highlight')
	{
		preg_match_all('~\w+~', $words, $m);
        if(!$m)
            return $text;
        $re = '~\\b(' . implode('|', $m[0]) . ')\\b~i';
        return preg_replace($re, '<span class="' . $classAttribute . '">$0</span>', $text);
	}

	public function formatCC($str)
    {
        if (preg_match('/\d{6}-\d{4}/', $str)) {
            return chunk_split(str_replace('-', '******', $str), 4, ' ');
        }

        return $str;
    }
}

