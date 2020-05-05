<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PercorsiStudente */

$this->title = Yii::t('app', 'Aggiungi Percorsi / Studente');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Percorsi / Studente'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="percorsi-studente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'alert' => $alert
    ]) ?>

</div>
