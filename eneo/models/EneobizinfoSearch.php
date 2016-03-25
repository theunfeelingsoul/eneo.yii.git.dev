<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Eneobizinfo;

/**
 * EneobizinfoSearch represents the model behind the search form about `app\models\Eneobizinfo`.
 */
class EneobizinfoSearch extends Eneobizinfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['tel', 'website', 'name', 'des', 'highlights', 'address'], 'safe'],
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
        $query = Eneobizinfo::find();
        // ->where(['user_id' => Yii::$app->user->identity->id])
        // ->all();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        if (Yii::$app->user->identity->role=='admin') {
            $query->andFilterWhere([
                'id' => $this->id,
            ]);
        }else{
            $query->andFilterWhere([
                'id' => $this->id,
                'user_id' => Yii::$app->user->identity->id,
            ]);
        }
        

        $query->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'des', $this->des])
            ->andFilterWhere(['like', 'highlights', $this->highlights])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
