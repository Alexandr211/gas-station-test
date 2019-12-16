<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Helper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Ticket2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Транзакции по топливным картам';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket2-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?//= Html::a('Create Ticket2', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <div class="panelBlock">
        <h4>Кол-во транзакций</h4>
        <?php if(!empty($panelData)){ foreach($panelData as $year=>$months){  ?>
        <p><?=$year.' ('.$months['total'].')'; ?></p>
        <ul class="classLi">
            <?php foreach($months as $month=>$number){ if(is_numeric($month)){ ?>
            <li ><?=Helper::monthName($month).' ('.$number.')'; ?></li>
            <?php } } ?>    
        </ul>        
        <?php }} ?>
    </div>  
       
    <div class="greedBlock">
        <?php  //Pjax::begin(); ?>
        <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
    //    'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

            //    'id',
                'card_number',
                'date',
                'volume',
                'service',
                'address_id',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

        <?php // Pjax::end(); ?>
    </div>
    

</div>
