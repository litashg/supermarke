<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ReportHistory;

/**
 * ReportHistorySearch represents the model behind the search form about `app\models\ReportHistory`.
 */
class ReportHistorySearch extends ReportHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'report_id', 'send_datetime'], 'integer'],
            [['status_id', 'status_comment'], 'safe'],
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
        $query = ReportHistory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }



        $query->joinWith('statusInfo');



        $query->andFilterWhere(['like','status.title',$this->status_id]);



        $query->andFilterWhere([
            'id' => $this->id,
            'report_id' => $this->report_id,
            'send_datetime' => $this->send_datetime,

        ]);

        $query->andFilterWhere(['like', 'status_comment', $this->status_comment]);

        return $dataProvider;
    }
}
