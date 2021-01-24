<?php

use app\models\search\UserSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/** @var  View $this
 * @var UserSearch $searchModel
 * @var ActiveDataProvider $dataProvider
 */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-entity-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Money transfer', ['transfer'], ['class' => 'btn btn-success', 'style' => ['margin-left' => '10px']]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'nickname',
            'balance',
            'created_at:datetime',

            ['class' => \yii\grid\ActionColumn::class],
        ],
    ]); ?>


</div>
