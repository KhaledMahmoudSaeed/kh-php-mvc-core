<?php

namespace app\core;

/**
 * Class View
 * 
 * @author KhaledMahmoudSaeed <khaild22k12m71f@gmail.com>
 * @package app\core
 */
class View
{
    public string $title = '';
    public function renderview($view, $params = [])
    {
        $viewcontent = $this->renderonlyview($view, $params);
        $layoutcontent = $this->Layoutcontent();
        return str_replace("{content}", $viewcontent, $layoutcontent);
    }
    public function Layoutcontent()
    {
        $layout = App::$app->layout;
        if (App::$app->controller) {
            $layout = App::$app->controller->layout;
        }
        ob_start();//  start caching
        include App::$ROOT_DIR . "../views/layouts/$layout.php";
        return ob_get_clean();// clean buffer
    }
    protected function renderonlyview($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();//  start caching
        include App::$ROOT_DIR . "../views/$view.php";
        return ob_get_clean();// clean buffer
    }
    public function renderContent($viewcontent)
    {
        $layoutcontent = $this->Layoutcontent();
        return str_replace('{{content}}', $viewcontent, $layoutcontent);
    }
}