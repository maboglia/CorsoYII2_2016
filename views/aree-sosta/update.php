<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AreeSosta */

$this->title = 'Aggiorna Area Sosta: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Aree Sosta', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Aggiorna';
?>
<div class="aree-sosta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
