<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DocumentsGuest;

/**
 * DocumentsGuestSearch represents the model behind the search form about `app\models\DocumentsGuest`.
 */
class DocumentsGuestSearch extends DocumentsGuest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'file_category_id'], 'integer'],
            [['name', 'path', 'title', 'desc'], 'safe'],
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
        $query = DocumentsGuest::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'file_category_id' => $this->file_category_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'desc', $this->desc]);

        return $dataProvider;
    }
}
