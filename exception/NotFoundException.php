<?php

namespace app\core\exception;


/**
 * Class NotFoundException
 *
 * @author KhaledMahmoudSaeed <khaild22k12m71f@gmail.com>
 * @package app\core\exception
 */
class NotFoundException extends \Exception
{
    protected $message = 'Page not found';
    protected $code = 404;
}