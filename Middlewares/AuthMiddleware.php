<?php
namespace app\core\Middlewares;

use app\core\App;
use app\core\exception\ForbiddenException;

/**
 * Class AuthMiddleware
 * 
 * @author KhaledMahmoudSaeed <khaild22k12m71f@gmail.com>
 * @package app\core\Middlewares
 */

class AuthMiddleware extends BaseMiddleWare
{
    protected array $actions = [];

    public function __construct($actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (App::isGuest()) {
            if (empty($this->actions) || in_array(App::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}