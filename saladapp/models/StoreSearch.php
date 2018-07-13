<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Store;

/**
 * StoreSearch represents the model behind the search form about `app\models\Store`.
 */
class StoreSearch extends Store
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name','company_id', 'description', 'phone', 'email', 'address'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Store::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->joinWith('storeCompany');

        $query->andFilterWhere([
            'id' => $this->id,
//            'company_id' => $this->company_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'company.name', $this->company_id])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
