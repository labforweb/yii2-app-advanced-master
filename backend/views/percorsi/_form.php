<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Percorsi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="percorsi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome_percorso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'durata')->textInput() ?>

    
    <?= $form->field($model, 'inizio')->widget(
    DatePicker::className(), [
       //'inline' => true, 
         // modify template for custom rendering
       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

    <?= $form->field($model, 'costo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
