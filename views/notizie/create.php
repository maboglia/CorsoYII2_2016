<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Notizie */

$this->title = 'Create Notizie';
$this->params['breadcrumbs'][] = ['label' => 'Notizies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notizie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
