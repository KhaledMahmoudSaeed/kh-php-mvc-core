<?php
namespace Khaild\Phpfirst\exception;

/**
 * Class ForbiddenException
 * 
 * @author KhaledMahmoudSaeed <khaild22k12m71f@gmail.com>
 * @package Khaild\Phpfirst\exception
 */
class ForbiddenException extends \Exception
{
    protected $message = "You don't have permession to access this page";
    protected $code = 403;

}
