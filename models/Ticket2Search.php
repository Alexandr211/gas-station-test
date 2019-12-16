<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ticket2;
use app\models\Helper;

/**
 * Ticket2Search represents the model behind the search form of `app\models\Ticket2`.
 */
class Ticket2Search extends Ticket2
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'address_id'], 'integer'],
            [['card_number', 'date', 'service'], 'safe'],
            [['volume'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Ticket2::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $helperModel = new Helper();              
        $findDataArr = $helperModel->dataParcer($this->date);
    //    \Yii::info(print_r($findDataArr['dateFrom'],1), 'logging');
        
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        //    'date' => $this->date,
            'volume' => $this->volume,
            'address_id' => $this->address_id,
        ]);

        $query->andFilterWhere(['like', 'card_number', $this->card_number])
            ->andFilterWhere(['like', 'service', $this->service]);
        
        if(!empty($findDataArr)){
            $query->andFilterWhere(['>=', 'date', $findDataArr['dateFrom']])
                ->andFilterWhere(['<', 'date', $findDataArr['dateTo']]);
                
        }

        return $dataProvider;
    }
}
