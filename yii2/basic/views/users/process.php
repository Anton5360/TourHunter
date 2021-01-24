<?php

use app\models\entities\TransfersEntity;
use app\models\entities\UsersEntity;
use yii\web\View;

/**
 * @var View $this
 * @var TransfersEntity $model
 */

$fromUser = UsersEntity::findOne(['id' => $model->from_user_id]);

$toUser = UsersEntity::findOne(['id' => $model->to_user_id]);

if($fromUser->balance - $model->amount >= $model::MINIMUM_BALANCE_VALUE) {

    $db = Yii::$app->db;
    $transaction = $db->beginTransaction();
    try {

        $db->createCommand()
            ->update('{{%users}}', ['balance' => $fromUser->balance - $model->amount], 'id = :id', [':id' => $model->from_user_id])
            ->execute();

        $db->createCommand()
            ->update('{{%users}}', ['balance' => $toUser->balance + $model->amount], 'id = :id', [':id' => $model->to_user_id])
            ->execute();

        $transaction->commit();

    } catch (\Exception $e) {
        $transaction->rollBack();
        throw $e;
    } catch (\Throwable $e) {
        $transaction->rollBack();
    }
}
Yii::$app->response->redirect('/users');