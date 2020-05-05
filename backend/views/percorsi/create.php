<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Percorsi */

$this->title = Yii::t('app', 'Aggiungi Percorsi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Percorsi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="percorsi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
