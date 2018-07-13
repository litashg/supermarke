<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FileCategory;

/**
 * FileCategorySearch represents the model behind the search form about `app\models\FileCategory`.
 */
class FileCategorySearch extends FileCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_global', 'for_shop', 'for_guest'], 'integer'],
            [[ 'parent_id','name'], 'safe'],
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
        $query = FileCategory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'is_global' => $this->is_global,
            'for_shop' => $this->for_shop,
            'for_guest' => $this->for_guest,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
        ->andFilterWhere(['like','name', $this->parent_id]);

        return $dataProvider;
    }
}
