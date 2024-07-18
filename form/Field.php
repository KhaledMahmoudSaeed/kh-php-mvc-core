<?php
namespace Khaild\Phpfirst\form;

use Khaild\Phpfirst\Model;

/**
 * Class Field
 * 
 * @author KhaledMahmoudSaeed <khaild22k12m71f@gmail.com>
 * @package Khaild\Phpfirst\form
 */
class Field extends BaseField
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';
    public string $type = '';
    public Model $model;

    public string $attribute;
    /**
     * Field constructor
     * @param \Khaild\Phpfirst\Model $Model
     * @param string $attribute
     */

    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        parent::__construct($model, $attribute);
    }
    public function __tostring()
    {

        return sprintf(
            '<div class="row g-3"">
                <label>%s</label>
                <input type="%s" name="%s" value="%s" class="form-control %s" id="validationServerUsername">
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    %s 
                </div>
            </div>',
            $this->model->getlabel($this->attribute) ?? $this->attribute,
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->haserror($this->attribute) ? 'is-invalid' : '',
            $this->model->getFirstError($this->attribute)
        );
    }
    public function passwordfield()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
    public function renderInput()
    {
        return sprintf(
            '<input type="%s" class="form-control%s" name="%s" value="%s">',
            $this->type,
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->attribute,
            $this->model->{$this->attribute},
        );
    }
}