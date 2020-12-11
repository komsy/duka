<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%shoeImage}}".
 *
 * @property int $imageId
 * @property int $listingId
 * @property string $image
 *
 * @property Listingdetails $listing
 */
class ShoeImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%shoeImage}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['listingId', 'image'], 'required'],
            [['listingId'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['listingId'], 'unique'],
            [['listingId'], 'exist', 'skipOnError' => true, 'targetClass' => Listingdetails::className(), 'targetAttribute' => ['listingId' => 'listingId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'imageId' => 'Image ID',
            'listingId' => 'Listing ID',
            'image' => 'Image',
        ];
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
     * {@inheritdoc}
     * @return ShoeImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShoeImageQuery(get_called_class());
    }
}
