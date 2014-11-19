<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Productoptiongroupmembers;

/**
 * SearchProductoptiongroupmembers represents the model behind the search form about `common\models\Productoptiongroupmembers`.
 */
class SearchProductoptiongroupmembers extends Productoptiongroupmembers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ProductOptionGroupMemberId', 'ProductOptionGroupId', 'DisplayOrder', 'created_by', 'LastUpdatedBy', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['Name', 'Comment'], 'safe'],
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
        $query = Productoptiongroupmembers::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ProductOptionGroupMemberId' => $this->ProductOptionGroupMemberId,
            'ProductOptionGroupId' => $this->ProductOptionGroupId,
            'DisplayOrder' => $this->DisplayOrder,
            'created_by' => $this->created_by,
            'LastUpdatedBy' => $this->LastUpdatedBy,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Comment', $this->Comment]);

        return $dataProvider;
    }
}
