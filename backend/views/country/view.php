<?PHP 
use yii\helpers\Html;
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Lista nazioni', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<h3><?PHP echo $model->name;?></h3>

<div class = "buttons" style = "margin-bottom:15px;">
<a href ="index.php?r=country/update&id=<?PHP echo $model->code;?>" id="btn_update" class="btn btn-primary">
Modifica</a>

<!-- <a href ="index.php?r=country/delete&id=<?PHP // echo $model->code;?>" id="btn_delete" class="btn btn-danger">
Cancella</a> -->

<?= Html::a(Yii::t('app', 'Cancella'), ['delete', 'id' => $model->code], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Sei sicuro?'),
                'method' => 'post',
            ],
        ]) ?>

</div>

<table class = "table table-hover table-bordered">
    <tr>
        <td>Code</td><td><?PHP echo $model->code;?></td>
    </tr>
    <tr>
        <td>Name</td><td><?PHP echo  $model->name;?></td>
    </tr>
    <tr>
        <td>Population</td><td><?PHP  echo $model->population;?></td>
    </tr>
</table>