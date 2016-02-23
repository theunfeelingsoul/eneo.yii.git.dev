<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Advideos;

/**
 * AdvideosSearch represents the model behind the search form about `app\models\Advideos`.
 */
class AdvideosSearch extends Advideos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'des', 'url', 'vid_cat_id', 'biz_id'], 'safe'],
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
        $query = Advideos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'des', $this->des])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'vid_cat_id', $this->vid_cat_id])
            ->andFilterWhere(['like', 'biz_id', $this->biz_id]);

        return $dataProvider;
    }
}
