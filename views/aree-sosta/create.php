<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AreeSosta */

$this->title = 'Inserisci nuova Area Sosta';
$this->params['breadcrumbs'][] = ['label' => 'Aree Sosta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aree-sosta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
