<?php


namespace Khaild\Phpfirst\form;


/**
 * Class TextareaField
 *
 * @author KhaledMahmoudSaeed <khaild22k12m71f@gmail.com>
 * @package Khaild\Phpfirst\form
 */
class TextareaField extends BaseField
{
    public function renderInput()
    {
        return sprintf(
            '<textarea class="form-control%s" name="%s">%s</textarea>',
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->attribute,
            $this->model->{$this->attribute},
        );
    }
}