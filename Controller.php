<?php
namespace Khaild\Phpfirst;

use Khaild\Phpfirst\App;
use Khaild\Phpfirst\Middlewares\BaseMiddleWare;

/**
 * Class Controller
 * 
 * @author KhaledMahmoudSaeed <khaild22k12m71f@gmail.com>
 * @package Khaild\Phpfirst
 */
class Controller
{
    /**
     * Summary of layout
     * @var \Khaild\Phpfirst\Middlewares\BaseMiddleWare
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