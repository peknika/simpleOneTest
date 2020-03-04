<?php

use common\models\User;
use \common\widgets\CommentWidget;
use common\models\Comment;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Film */
/* @var $comments Comment[] */
/* @var  $users User[] */

$comment = new Comment();

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Films', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="film-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'director_id',
            'year',
            'review',
        ],
    ]) ?>

    <div class="comment-form">
        <p>
            <?php $form = ActiveForm::begin(['method' => 'post', 'action' => [
                'comment/add',
                'instance_name' => Comment::INSTANCE_NAME_FILM,
                'instance_record_id' => $model->id
            ],]); ?>
            <?= $form->field($comment, 'text')->textarea(['rows' => 3]) ?>
        </p>
        <p>
            <?= Html::submitButton('Add comment', ['class' => 'btn btn-success']) ?>
            <?php ActiveForm::end(); ?>
        </p>
    </div>

    <?php

    function buildComment($comments, $currentComment, $users, $level)
    {
        echo CommentWidget::widget([
            'model' => $currentComment,
            'level' => $level,
            'username' => $currentComment->user_id ? $currentComment->getUser($currentComment->user_id)->one()->username: 'incognito'
        ]);
        foreach ($comments as $comment) {
            if ($comment->parent_id === $currentComment->id) {
                buildComment($comments, $comment, $users, $level + 20);
            }
        }
    }

    foreach ($comments as $comm)
    {
        if(!$comm->parent_id)
        {
            buildComment($comments,$comm, $users,15);
        }
    }
    ?>

</div>
