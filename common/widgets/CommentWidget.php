<?php
namespace common\widgets;

use yii\base\InvalidConfigException;
use yii\helpers\Html;


class CommentWidget extends \yii\bootstrap\Widget
{
public $model;
public $username;
public $level;

    public function init(){
        parent::init();
        if ($this->model === null) {
            throw new InvalidConfigException('Please specify the "model" property.');
        }
    }

    public function run()
    {
        $attributes = $this->model->attributes;
        return "<div style=\"padding-left: {$this->level}px\">
                            <div style=\"background-color: skyblue\">
                            <h4>{$attributes['created_at']} {$this->username}</h4>
                            <p>{$attributes['text']}<p/>
                            </div>
                        </div>";
    }
}
?>