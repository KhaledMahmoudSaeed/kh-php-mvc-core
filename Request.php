<?php
namespace Khaild\Phpfirst;

/**
 * Class Request
 * @author KhaledMahmoudSaeed <khaild22k12m71f@gmail.com>
 * @package Khaild\Phpfirst
 */

class Request
{
    public function getpath()
    {
        $path = $_SERVER["REQUEST_URI"] ?? "/";
        $postion = strpos($path, "?");
        if ($postion === false) {
            return $path;
        }
        return substr($path, 0, $postion);
    }
    public function method()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }
    public function isGet()
    {
        return $this->method() === 'get';
    }
    public function isPost()
    {
        return $this->method() === 'post';
    }
    public function getbody()
    {
        $body = [];
        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {

                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->method() === 'post') {
            foreach ($_POST as $key => $value) {

                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }

}
