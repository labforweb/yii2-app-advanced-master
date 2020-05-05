<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Studenti */

$this->title = Yii::t('app', 'Aggiungi Studenti');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Studenti'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="studenti-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
