<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Categorydetails]].
 *
 * @see Categorydetails
 */
class CategorydetailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Categorydetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Categorydetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
