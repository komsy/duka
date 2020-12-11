<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "{{%cart}}".
 *
 * @property int $cartId
 * @property int $listingId
 * @property int $userId
 *
 * @property User $user
 * @property Listingdetails $listing
 * @property ShoeImage $listing0
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cart}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['listingId', 'userId'], 'required'],
            [['listingId', 'userId'], 'integer'],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
            [['listingId'], 'exist', 'skipOnError' => true, 'targetClass' => Listingdetails::className(), 'targetAttribute' => ['listingId' => 'listingId']],
            [['listingId'], 'exist', 'skipOnError' => true, 'targetClass' => ShoeImage::className(), 'targetAttribute' => ['listingId' => 'listingId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cartId' => 'Cart ID',
            'listingId' => 'Listing ID',
            'userId' => 'User ID',
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
     * Gets query for [[Listing]].
     *
     * @return \yii\db\ActiveQuery|ListingdetailsQuery
     */
    public function getListing()
    {
        return $this->hasOne(Listingdetails::className(), ['listingId' => 'listingId']);
    }

    /**
     * Gets query for [[Listing0]].
     *
     * @return \yii\db\ActiveQuery|ShoeImageQuery
     */
    public function getListing0()
    {
        return $this->hasOne(ShoeImage::className(), ['listingId' => 'listingId']);
    }

    /**
     * {@inheritdoc}
     * @return CartQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CartQuery(get_called_class());
    }
}
