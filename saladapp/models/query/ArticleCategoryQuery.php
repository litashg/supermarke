<?php
namespace app\models\query;

use app\models\Article;
use app\models\ArticleCategory;
use yii\db\ActiveQuery;

class ArticleCategoryQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function active()
    {
        $this->andWhere(['status' => ArticleCategory::STATUS_ACTIVE]);
        return $this;
    }
    /**
     * @return $this
     */
    public function noParents()
    {
        $this->andWhere('article_category.parent_id IS NULL');
        return $this;
    }
}