<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PercorsiStudente */

$this->title = $model->getStudenti()->One()['nome'] . " " . $model->getStudenti()->One()['cognome'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Percorsi / Studente'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="percorsi-studente-view">

<?PHP
if (Yii::$app->session->hasFlash('Attenzione')){?>

<div class="alert alert-danger" role="alert">
  Attenzione! Il record già esiste
</div>

<?PHP }

?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            [
                'label' => Yii::t('app','Studente'),
                'value' =>  function($model){
                    return $model->getStudenti()->One()['nome'] . " " . $model->getStudenti()->One()['cognome'];
                } 
                ],
            'percorsi.nome_percorso',
            'pagato'
        ],
    ]) ?>

</div>
