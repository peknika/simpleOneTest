<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FilmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Films';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Film', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'director_id',
            'year',
            'director.name',
            'review',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
