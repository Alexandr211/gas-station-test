<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket2 */

$this->title = 'Create Ticket2';
$this->params['breadcrumbs'][] = ['label' => 'Ticket2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
