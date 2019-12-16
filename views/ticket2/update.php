<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket2 */

$this->title = 'Update Ticket2: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ticket2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ticket2-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
