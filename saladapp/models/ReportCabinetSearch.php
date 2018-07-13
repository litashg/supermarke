<?php

namespace app\models;


use app\models\ReportCabinet;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * ReportSearch represents the model behind the search form about `app\models\Report`.
 */
class ReportCabinetSearch extends ReportCabinet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type_id', 'user_id', 'store_id', 'status_id'], 'integer'],
            [['comment', 'checker_comment', 'creation_date', 'transaction'], 'safe'],
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
        $query = ReportCabinet::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type_id' => $this->type_id,
            'user_id' => $this->user_id,
            'store_id' => $this->store_id,
            'status_id' => $this->status_id,
            'creation_date' => $this->creation_date,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment])
//            ->andFilterWhere(['like', 'checker_comment', $this->checker_comment])
            ->andFilterWhere(['like', 'transaction', $this->transaction]);

        return $dataProvider;
    }
}
