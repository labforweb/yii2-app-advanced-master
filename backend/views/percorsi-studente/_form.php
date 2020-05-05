<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Percorsi;
use app\models\Studenti;

/* @var $this yii\web\View */
/* @var $model app\models\PercorsiStudente */
/* @var $form yii\widgets\ActiveForm */
?>


<?PHP 
if (isset($alert) && !empty($alert)){?>

    <div class="alert alert-warning" role="alert">
     <?PHP    echo $alert; ?>
    </div>
<?PHP 
}

?>

<div class="percorsi-studente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?PHP
    
    
    if(!isset($_GET['action'])){ //sono in modalità Update
        echo $form->field($model, 'studenti_id')->textInput(['readonly' => true]);
    } else{ //sono in modalità insert

        //echo $form->field($model, 'studenti_id')->textInput();
        $model_dropdown = Studenti::find()->orderBy('cognome')->all();

        echo $form->field($model, 'studenti_id')->dropDownList(ArrayHelper::map($model_dropdown, 'id_studente', function($model_dropdown){ 
            return $model_dropdown->nome.' '.$model_dropdown->cognome;}), 
            ['prompt' => 'Seleziona studente']);


    }

   echo $form->field($model, 'percorsi_id')->dropDownList(ArrayHelper::map(Percorsi::find()->orderBy('nome_percorso')->all(), 'id_percorso', 'nome_percorso'), ['prompt' => 'Seleziona percorso']);
   echo $form->field($model, 'pagato')->dropDownList([ 'Si' => 'Si', 'No' => 'No', ], ['prompt' => 'Seleziona']) ?> 
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
