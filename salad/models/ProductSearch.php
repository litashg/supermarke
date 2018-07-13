<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cat_id', 'c1_size', 'c1_container', 'c1_calories', 'c1_calfat', 'c2_totfat_1', 'c2_totfat_2', 'c2_satfat_1', 'c2_satfat_2', 'c2_transfat_1', 'c2_transfat_2', 'c2_cholester_1', 'c2_cholester_2', 'c2_sod_1', 'c2_sod_2', 'c3_totcarb_1', 'c3_totcarb_2', 'c3_dietfib_1', 'c3_dietfib_2', 'c3_sugar_1', 'c3_sugar_2', 'c3_protein_1', 'c3_protein_2', 'c3_calcium', 'c3_iron', 'c2_vit_a', 'c2_vit_c'], 'integer'],
            [['name', 'desc_title', 'full_desc', 'prod_img'], 'safe'],
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
        $query = Product::find()->where('parent_product = 0' );
       // $query = Product::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'cat_id' => $this->cat_id,
            'c1_size' => $this->c1_size,
            'c1_container' => $this->c1_container,
            'c1_calories' => $this->c1_calories,
            'c1_calfat' => $this->c1_calfat,
            'c2_totfat_1' => $this->c2_totfat_1,
            'c2_totfat_2' => $this->c2_totfat_2,
            'c2_satfat_1' => $this->c2_satfat_1,
            'c2_satfat_2' => $this->c2_satfat_2,
            'c2_transfat_1' => $this->c2_transfat_1,
            'c2_transfat_2' => $this->c2_transfat_2,
            'c2_cholester_1' => $this->c2_cholester_1,
            'c2_cholester_2' => $this->c2_cholester_2,
            'c2_sod_1' => $this->c2_sod_1,
            'c2_sod_2' => $this->c2_sod_2,
            'c3_totcarb_1' => $this->c3_totcarb_1,
            'c3_totcarb_2' => $this->c3_totcarb_2,
            'c3_dietfib_1' => $this->c3_dietfib_1,
            'c3_dietfib_2' => $this->c3_dietfib_2,
            'c3_sugar_1' => $this->c3_sugar_1,
            'c3_sugar_2' => $this->c3_sugar_2,
            'c3_protein_1' => $this->c3_protein_1,
            'c3_protein_2' => $this->c3_protein_2,
            'c3_calcium' => $this->c3_calcium,
            'c3_iron' => $this->c3_iron,
            'c2_vit_a' => $this->c2_vit_a,
            'c2_vit_c' => $this->c2_vit_c,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'desc_title', $this->desc_title])
            ->andFilterWhere(['like', 'full_desc', $this->full_desc])
            ->andFilterWhere(['like', 'prod_img', $this->prod_img]);

        return $dataProvider;
    }
}
