<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserSalad;

/**
 * UserSaladSearch represents the model behind the search form about `app\models\UserSalad`.
 */
class UserSaladSearch extends UserSalad
{
    /**
     * @inheritdoc
     */
    public  $rname;
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['name', 'img', 'ingred', 'email', 'user_name', 'created','rname','uniq_id'], 'safe'],
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
        $query = UserSalad::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created' => $this->created,
            'user_id' => $this->user_id,
            'uniq_id' => $this->uniq_id,

        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'ingred', $this->ingred])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'uniq_id', $this->uniq_id])
            ->andFilterWhere(['like', 'user_name', $this->user_name]);

        return $dataProvider;
    }
}
