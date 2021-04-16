<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inventory;

/**
 * InventorySearch represents the model behind the search form of `app\models\Inventory`.
 */
class InventorySearch extends Inventory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id',], 'integer'],
            [['serial', 'item_id','category_id','brand_id','model', 'description','user_id','room_id','block_id','status'], 'safe'],
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
        $query = Inventory::find();

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

         $query->joinWith(['user','room','block','item','category','brand']);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            // 'item_id' => $this->item_id,
            // 'category_id' => $this->category_id,
            // 'brand_id' => $this->brand_id,
            // 'status' => $this->status,
            // 'block_id' => $this->block_id,
            // 'room_id' => $this->room_id,
            // 'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'serial', $this->serial])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'user.username', $this->user_id])
            ->andFilterWhere(['like', 'room.name', $this->room_id])
            ->andFilterWhere(['like', 'blocks.names', $this->block_id])
            ->andFilterWhere(['like', 'item.name', $this->item_id])
            ->andFilterWhere(['like', 'category.name', $this->category_id])
            ->andFilterWhere(['like', 'brand.name', $this->brand_id])
            ->andFilterWhere(['like', 'description', $this->description]);
        return $dataProvider;
    }
}
