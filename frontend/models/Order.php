<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property int $orderId
 * @property int $userId
 * @property int $phoneNumber
 * @property string $email
 * @property string $address
 *
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderId', 'userId', 'phoneNumber', 'email', 'address'], 'required'],
            [['orderId', 'userId', 'phoneNumber'], 'integer'],
            [['email', 'address'], 'string', 'max' => 255],
            [['orderId'], 'unique'],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'orderId' => 'Order ID',
            'userId' => 'User ID',
            'phoneNumber' => 'Phone Number',
            'email' => 'Email',
            'address' => 'Address',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    /**
     * {@inheritdoc}
     * @return OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderQuery(get_called_class());
    }
}
