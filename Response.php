<?php
namespace Khaild\Phpfirst;

/**
 * Class Response
 * @author KhaledMahmoudSaeed <khaild22k12m71f@gmail.com>
 * @package Khaild\Phpfirst
 */

class Response
{
    public function setstatuscode(int $code)
    {
        http_response_code($code);
    }
    public function redirect(string $url)
    {
        header('Location: ' . $url);
    }
}