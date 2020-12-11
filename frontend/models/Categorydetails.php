<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%categorydetails}}".
 *
 * @property int $categoryId
 * @property string $category
 *
 * @property Listingdetails[] $listingdetails
 */
class Categorydetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%categorydetails}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category'], 'required'],
            [['category'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'categoryId' => 'Category ID',
            'category' => 'Category',
        ];
    }

    /**
     * Gets query for [[Listingdetails]].
     *
     * @return \yii\db\ActiveQuery|ListingdetailsQuery
     */
    public function getListingdetails()
    {
        return $this->hasMany(Listingdetails::className(), ['cartegoryId' => 'categoryId']);
    }

    /**
     * {@inheritdoc}
     * @return CategorydetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategorydetailsQuery(get_called_class());
    }
}
