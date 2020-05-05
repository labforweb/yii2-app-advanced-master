<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PercorsiStudente */

$this->title = Yii::t('app', 'Update ' . $model->getPercorsi()->One()['nome_percorso']);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Percorsi / Studente'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->getStudenti()->One()['nome'] . " " . $model->getStudenti()->One()['cognome'], 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="percorsi-studente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'alert' => $alert
    ]) ?>

</div>
