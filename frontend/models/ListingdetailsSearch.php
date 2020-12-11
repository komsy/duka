<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Listingdetails;

/**
 * ListingdetailsSearch represents the model behind the search form of `frontend\models\Listingdetails`.
 */
class ListingdetailsSearch extends Listingdetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['listingId', 'cartegoryId', 'price'], 'integer'],
            [['shoeName', 'createdAt', 'description'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Listingdetails::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'listingId' => $this->listingId,
            'cartegoryId' => $this->cartegoryId,
            'price' => $this->price,
            'createdAt' => $this->createdAt,
        ]);

        $query->andFilterWhere(['like', 'shoeName', $this->shoeName])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
