<?php

namespace app\core\Middlewares;

/**
 * Class BasMiddleware
 * 
 * @author KhaledMahmoudSaeed <khaild22k12m71f@gmail.com>
 * @package app\core\Middlewares
 */

abstract class BaseMiddleware
{
    abstract public function execute();
}
