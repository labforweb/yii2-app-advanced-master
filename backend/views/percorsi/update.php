<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Percorsi */

$this->title = Yii::t('app', 'Modifica Percorsi: {name}', [
    'name' => $model->nome_percorso,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Percorsi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome_percorso, 'url' => ['view', 'id' => $model->id_percorso]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Modifica');
?>
<div class="percorsi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
