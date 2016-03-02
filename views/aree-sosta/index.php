<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aree Sostas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aree-sosta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Aree Sosta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
             [
             'name'=>'id',
           'label'=>'bla',
           'format' => 'url',
           'value' => $data['id'],

    ],
            'nomeArea',
            //'descrizione:ntext',
            'comune',
            'latitudine',
            'longitudine',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
