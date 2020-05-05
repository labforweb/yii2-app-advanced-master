<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Percorsi */

$this->title = $model->nome_percorso;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Percorsi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="percorsi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Modifica'), ['update', 'id' => $model->id_percorso], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancella'), ['delete', 'id' => $model->id_percorso], [
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
            'id_percorso',
            'nome_percorso',
            'durata',
            'inizio',
            'costo',
        ],
    ]) ?>

</div>
