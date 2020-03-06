<?php

use \common\widgets\Comments;
use common\models\Comment;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Film */
/* @var $comments Comment[] */

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

    <?= Comments::widget([
        'comments' => $comments
    ]);
    ?>

    <script>
        const form = document.getElementById('w1');
        const buttons = document.getElementsByClassName('reply');
        const textarea = document.getElementById('comment-text')
        for (button of buttons) {
            button.addEventListener('click', (event) => {
                const {parent_id} = event.target.dataset;
                textarea.focus();
                form.action = form.action + '&parent_id=' + parent_id;
                console.log(form.action)
            });
        }
    </script>
</div>
