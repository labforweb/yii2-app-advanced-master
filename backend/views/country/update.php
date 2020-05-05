
<?PHp 
$this->title = "Modifica";
$this->params['breadcrumbs'][] = ['label' => 'Lista nazioni', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->code]];
$this->params['breadcrumbs'][] = $this->title;
?>
<h3>Modifica <?PHP echo $model->name; ?></h3>

<?PHP 
    echo $this->render('_form', ['model' => $model]);
?>