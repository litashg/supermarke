<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StorePlanogram;

/**
 * StorePlanogramSearch represents the model behind the search form about `app\models\StorePlanogram`.
 */
class StorePlanogramSearch extends StorePlanogram
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['path', 'store_id', 'title', 'description'], 'safe'],
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
        $query = StorePlanogram::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }



        $query->joinWith('store');
        $query->andFilterWhere(['like','store.name',$this->store_id]);



        $query->andFilterWhere([
            'id' => $this->id
        ]);

        $query->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
