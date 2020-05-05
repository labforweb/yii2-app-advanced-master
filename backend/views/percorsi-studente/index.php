<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PercorsiStudenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Percorsi / Studente');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="percorsi-studente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Aggiungi Percorso / Studente'), ['create','action' =>1], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            //'id',
            //'studenti_id',
            //'percorsi_id',
            [
                'label' => Yii::t('app','Studente'),
                'value' =>  function($model){
                    return $model->getStudenti()->One()['nome'] . " " . $model->getStudenti()->One()['cognome'];
                } 
                ],
            [
                'attribute' => 'nome_percorso',
                'label' => Yii::t('app','Titolo'),
                'value' =>  'percorsi.nome_percorso' 
                //vuol dire che nel Model => PercorsiStudente esiste un metodo getPercorsi() che consentirà di estrarre un oggetto che conterrà i campi nome_percorso, data_inizio etc
                ],
              
            'pagato',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
