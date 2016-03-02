<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AreeSosta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aree-sosta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomeArea')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descrizione')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'comune')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitudine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitudine')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Inserisci' : 'Aggiorna', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
