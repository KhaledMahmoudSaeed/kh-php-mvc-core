<?php
namespace app\core;

use app\core\App;
use app\core\Middlewares\BaseMiddleWare;

/**
 * Class Controller
 * 
 * @author KhaledMahmoudSaeed <khaild22k12m71f@gmail.com>
 * @package app\core
 */
class Controller
{
    /**
     * Summary of layout
     * @var \app\core\Middlewares\BaseMiddleWare
     */
    public string $layout = 'main';
    public string $action = ' ';
    protected array $middleware = [];
    public function setlayout($layout)
    {
        $this->layout = $layout;
    }
    public function render($view, $params = [])
    {
        return App::$app->view->renderview($view, $params);
    }
    public function registerMiddleware(BaseMiddleWare $middleware)
    {
        $this->middleware[] = $middleware;
    }
    public function getMiddleware(): array
    {
        return $this->middleware;
    }
}