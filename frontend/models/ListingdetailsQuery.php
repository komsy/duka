<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Listingdetails]].
 *
 * @see Listingdetails
 */
class ListingdetailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Listingdetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Listingdetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
