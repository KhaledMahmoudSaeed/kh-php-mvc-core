<?php
namespace Khaild\Phpfirst;

/**
 * Class UserModel
 * 
 * @author KhaledMahmoudSaeed <khaild22k12m71f@gmail.com>
 * @package Khaild\Phpfirst
 */

abstract class UserModel extends DbModel
{
    abstract public function getDisplayname(): string;
}