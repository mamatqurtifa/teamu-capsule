<?php

namespace App\Helpers;

class TextHelper
{
    public static function safeJsonEncode($text)
    {
        return htmlspecialchars(json_encode($text), ENT_QUOTES, 'UTF-8');
    }
}