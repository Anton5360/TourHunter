<?php


namespace app\models\forms;


use yii\base\Model;

class TransferForm extends Model
{
    public ?string $fromUser = null;
    public ?string $toUser = null;
    public ?string $amount = null;

    public function rules()
    {
        return [
            [['from_user_id', 'toUser, amount'], 'required'],
            [['amount'], 'integer']
        ];
    }

}