
<?PHp 
$this->title = "Aggiungi";
$this->params['breadcrumbs'][] = ['label' => 'Lista nazioni', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h3>Aggiungi Nazione</h3>

<?PHP 
    echo $this->render('_form', ['model' => $model]);
?>