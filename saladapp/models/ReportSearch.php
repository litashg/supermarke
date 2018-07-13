<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Report;

/**
 * ReportSearch represents the model behind the search form about `app\models\Report`.
 */
class ReportSearch extends Report
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['type_id', 'user_id', 'store_id', 'status_id','comment',  'creation_date', 'transaction'], 'safe'],
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
        $query = Report::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }








        $query->joinWith('typeInfo');
        $query->joinWith('userInfo');
        $query->joinWith('storeInfo');
        $query->joinWith('statusInfo');


        $query->andFilterWhere(['like','report_type.name',$this->type_id]);
        $query->andFilterWhere(['like','user.username',$this->user_id]);
        $query->andFilterWhere(['like','store.name',$this->store_id]);
        $query->andFilterWhere(['like','status.title',$this->status_id]);



        $query->andFilterWhere([
            'id' => $this->id,
//            'type_id' => $this->type_id,
//            'user_id' => $this->user_id,
//            'store_id' => $this->store_id,
//            'status_id' => $this->status_id,
            'creation_date' => $this->creation_date,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment])
//            ->andFilterWhere(['like', 'checker_comment', $this->checker_comment])
            ->andFilterWhere(['like', 'transaction', $this->transaction]);

        return $dataProvider;
    }
}
