<?php
namespace Khaild\Phpfirst\form;

use Khaild\Phpfirst\form\Field;
use Khaild\Phpfirst\Model;

/**
 * Class Form
 * 
 * @author KhaledMahmoudSaeed <khaild22k12m71f@gmail.com>
 * @package Khaild\Phpfirst\form
 */
class Form
{
    public static function begin($action, $method)
    {

        echo sprintf('<form action="%s" method="%s" >', $action, $method);
        return new Form();
    }
    public static function end()
    {
        echo '</form>';
    }
    public function field(Model $model, $attribute)
    {
        return new Field($model, $attribute);
    }
}