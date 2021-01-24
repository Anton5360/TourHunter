<?php

use app\models\entities\TransfersEntity;
use app\models\entities\UsersEntity;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\web\View;
/**
 * @var View $this
 * @var TransfersEntity $model
 */

$nicknames = ArrayHelper::map(UsersEntity::find()->all(), 'id', 'nickname');
ArrayHelper::remove($nicknames, Yii::$app->user->id);

$model->from_user_id = Yii::$app->user->id;

?>

<div>
    <?php $form = ActiveForm::begin(['method' => 'post']); ?>
    <?= $form->field($model, 'from_user_id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'to_user_id')->dropDownList($nicknames) ?>
    <?= $form->field($model, 'amount')->textInput() ?>
    <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end() ?>
</div>
