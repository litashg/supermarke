<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ReportTemplate;

/**
 * ReportTemplateSearch represents the model behind the search form about `app\models\ReportTemplate`.
 */
class ReportTemplateSearch extends ReportTemplate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'report_group_id', 'report_type_id', 'store_id', 'report_type_option_id'], 'integer'],
            [['name', 'description'], 'safe'],
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
        $query = ReportTemplate::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'report_group_id' => $this->report_group_id,
            'report_type_id' => $this->report_type_id,
            'store_id' => $this->store_id,
            'report_type_option_id' => $this->report_type_option_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
