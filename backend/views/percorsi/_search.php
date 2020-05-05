<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PercorsiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="percorsi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_percorso') ?>

    <?= $form->field($model, 'nome_percorso') ?>

    <?= $form->field($model, 'durata') ?>

    <?= $form->field($model, 'inizio') ?>

    <?= $form->field($model, 'costo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
