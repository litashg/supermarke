<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ReportTypeOption;

/**
 * ReportTypeOptionSearch represents the model behind the search form about `app\models\ReportTypeOption`.
 */
class ReportTypeOptionSearch extends ReportTypeOption
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['report_type_id'], 'safe'],
            [['title','report_option_type_id'], 'safe'],
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
        $query = ReportTypeOption::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->joinWith('typeInfo');
        $query->andFilterWhere(['like','report_option_type.type',$this->report_option_type_id]);

        $query->joinWith('reportType');
        $query->andFilterWhere(['like','report_type.name',$this->report_type_id]);

        $query->andFilterWhere([
            'id' => $this->id,
//            'report_option_type_id' => $this->report_option_type_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
