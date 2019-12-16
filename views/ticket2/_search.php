<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket2Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket2-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?//= $form->field($model, 'id') ?>

    <?= $form->field($model, 'card_number', [ 'options' => ['style' => 'width: 187px']]) ?>

    <?= $form->field($model, 'date', ['options' => ['value' => '']])->widget(\yii\jui\DatePicker::classname(), [
    'language' => 'ru',
    'dateFormat' => 'yyyy-MM',    
    'clientOptions' => [ 
    'changeYear'=>true,
    'changeMonth'=>true,    
 ],
    
]) ?>

    <?//= $form->field($model, 'volume') ?>

    <?//= $form->field($model, 'service') ?>

    <?php // echo $form->field($model, 'address_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?//= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
        <?= Html::a('Reset', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
