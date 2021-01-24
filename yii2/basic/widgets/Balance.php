<?php


namespace app\widgets;


use app\models\entities\UsersEntity;
use yii\bootstrap\Html;
use yii\bootstrap\Widget;

class Balance extends Widget
{
    public function run()
    {
        $model = UsersEntity::findOne(['id' => \Yii::$app->user->id]);

        echo Html::a("Balance: {$model->balance}", ['/']);
    }
}