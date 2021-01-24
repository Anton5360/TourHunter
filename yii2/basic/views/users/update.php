<?php

use app\models\entities\UsersEntity;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var  View $this
 * @var UsersEntity $model
 */

$this->title = 'Update User: ' . $model->nickname;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nickname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="users-entity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
