<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ReportOptions;

/**
 * ReportOptionsSearch represents the model behind the search form about `app\models\ReportOptions`.
 */
class ReportOptionsSearch extends ReportOptions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'report_type_option_id', 'report_id'], 'integer'],
            [['value'], 'safe'],
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
        $query = ReportOptions::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'report_type_option_id' => $this->report_type_option_id,
            'report_id' => $this->report_id,
        ]);

        $query->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}
