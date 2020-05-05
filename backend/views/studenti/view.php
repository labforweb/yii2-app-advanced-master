<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Studenti */

$this->title = ucfirst($model->nome) . " " . ucfirst($model->cognome);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Studenti'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="studenti-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Modifica'), ['update', 'id' => $model->id_studente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancella'), ['delete', 'id' => $model->id_studente], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Sei sicuro?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_studente',
            'nome',
            'cognome',
        ],
    ]) ?>

</div>
