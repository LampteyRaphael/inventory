<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RequestSub;

/**
 * RequestSubSearch represents the model behind the search form of `app\models\RequestSub`.
 */
class RequestSubSearch extends RequestSub
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'quantity', 'request_id', 'quantityIssued'], 'integer'],
            [['created_at','user_id','remark','autOfficer', 'item_id','updated_at'], 'safe'],
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
        $query = RequestSub::find();

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

         $query->joinWith(['item','officer','remarks']);
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'quantity' => $this->quantity,
            'request_id' => $this->request_id,
            'quantityIssued' => $this->quantityIssued,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'user.username', $this->autOfficer]);
        $query->andFilterWhere(['like', 'item.name', $this->item_id]);
        $query->andFilterWhere(['like', 'user.username', $this->user_id]);
        $query->andFilterWhere(['like', 'remark.name', $this->remark]);
        return $dataProvider;
    }
}
