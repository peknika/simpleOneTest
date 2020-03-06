<?php

namespace common\widgets;

use yii\base\InvalidConfigException;
use yii\helpers\Html;


class Comments extends \yii\bootstrap\Widget
{
    public $comments;


    public function init()
    {
        parent::init();
        if ($this->comments === null) {
            throw new InvalidConfigException('Please specify the "model" property.');
        }
    }

    function buildComment($comments, $currentComment, $level)
    {
        echo Comment::widget([
            'model' => $currentComment,
            'level' => $level,
            'username' => $currentComment->user_id ? $currentComment->getUser($currentComment->user_id)->one()->username : 'incognito'
        ]);
        echo Html::button('Reply', ['class' => 'btn btn-secondary btn-sm reply', 'data' => [
            'parent_id' => $currentComment->id]]);
        foreach ($comments as $comment) {
            if ($comment->parent_id === $currentComment->id) {
                $this->buildComment($comments, $comment, $level + 20);
            }
        }
    }

    public function run()
    {
        foreach ($this->comments as $comm) {
            if (!$comm->parent_id) {
                return $this->buildComment($this->comments, $comm, 10);
            }
        }
    }
}

?>