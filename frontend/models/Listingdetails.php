<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%listingdetails}}".
 *
 * @property int $listingId
 * @property int $cartegoryId
 * @property string $shoeName
 * @property int $price
 * @property string $createdAt
 * @property string $description
 *
 * @property Cart[] $carts
 * @property Categorydetails $cartegory
 * @property ShoeImage $shoeImage
 */
class Listingdetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%listingdetails}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cartegoryId', 'shoeName', 'price', 'description'], 'required'],
            [['cartegoryId', 'price'], 'integer'],
            [['createdAt'], 'safe'],
            [['shoeName', 'description'], 'string', 'max' => 255],
            [['cartegoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Categorydetails::className(), 'targetAttribute' => ['cartegoryId' => 'categoryId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'listingId' => 'Listing ID',
            'cartegoryId' => 'Cartegory ID',
            'shoeName' => 'Shoe Name',
            'price' => 'Price',
            'createdAt' => 'Created At',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery|CartQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['listingId' => 'listingId']);
    }

    /**
     * Gets query for [[Cartegory]].
     *
     * @return \yii\db\ActiveQuery|CategorydetailsQuery
     */
    public function getCartegory()
    {
        return $this->hasOne(Categorydetails::className(), ['categoryId' => 'cartegoryId']);
    }

    /**
     * Gets query for [[ShoeImage]].
     *
     * @return \yii\db\ActiveQuery|ShoeImageQuery
     */
    public function getShoeImage()
    {
        return $this->hasOne(ShoeImage::className(), ['listingId' => 'listingId']);
    }

    /**
     * {@inheritdoc}
     * @return ListingdetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ListingdetailsQuery(get_called_class());
    }
}
