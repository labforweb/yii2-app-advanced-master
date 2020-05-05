<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Studenti */

$this->title = Yii::t('app', 'Modifica Studenti: {name}', [
    'name' => ucfirst($model->nome) . " " . ucfirst($model->cognome),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Studenti'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => ucfirst($model->nome) . " " . ucfirst($model->cognome), 'url' => ['view', 'id' => $model->id_studente]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="studenti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
