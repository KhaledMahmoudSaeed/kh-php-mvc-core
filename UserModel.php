<?php
namespace app\core;

/**
 * Class UserModel
 * 
 * @author KhaledMahmoudSaeed <khaild22k12m71f@gmail.com>
 * @package app\core
 */

abstract class UserModel extends DbModel
{
    abstract public function getDisplayname(): string;
}