<?php

namespace Khaild\Phpfirst;

use Khaild\Phpfirst\Controller;
use Khaild\Phpfirst\App;
use Khaild\Phpfirst\Middlewares;
use Khaild\Phpfirst\exception\NotFoundException;

/**
 * Class Router
 * 
 * @author KhaledMahmoudSaeed <khaild22k12m71f@gmail.com>
 * @package Khaild\Phpfirst
 */

class Router
{

    /**
     * Router constructor
     * @param \Khaild\Phpfirst\Request $requset
     * @param \Khaild\Phpfirst\Response $response  
     * @param \Khaild\Phpfirst\Response $r
     */
    protected array $routes = [];
    public Response $response;
    public Controller $controller;
    public Request $request;
    // we take from App a request object that assigned to router we do this for only don't write in constructor $this->request= new Request()  literally ^_^
    public function __construct(
        Request $request,
        Response $response
    ) {
        $this->response = $response;
        $this->request = $request;
    }
    public function get(
        $path,
        $callback_fun
    ) {
        $this->routes['get'][$path] = $callback_fun;
    }
    public function post(
        $path,
        $callback_fun
    ) {
        $this->routes['post'][$path] = $callback_fun;
    }
    public function resolve()
    {
        $path = $this->request->getpath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            throw new NotFoundException();
        }
        if (is_string($callback)) {
            return App::$app->view->renderview($callback);
        }
        if (is_array($callback)) {
            // $callback[0] = new $callback[0]();
            // if (get_class($callback[0]) === "app\controllers\SiteController") {
            //     $this->type = "main";
            // } else {
            //     $this->type = "auth";
            // }
            // }
            /** @var  \Khaild\Phpfirst\Controller $controller  */
            $controller = new $callback[0]();
            App::$app->controller = $controller;
            $controller->action = $callback[1];
            foreach ($controller->getMiddleware() as $middleware) {
                $middleware->execute();
            }
            $callback[0] = $controller;

        }
        // here must transfer string to object by asign $callback[0]= new $callback[0](); but i have a problem here because i have a constractor for SiteController
        return call_user_func($callback, $this->request, $this->response);
    }
}