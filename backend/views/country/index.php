<?PHP 
$this->title = "Lista nazioni" ;
$this->params['breadcrumbs'][] = $this->title;
?>
<h3>Elenco dei paesi nella tabella Country</h3>
<div class = "buttons" style = "margin-bottom:15px;">
<a href ="index.php?r=country/create" class="btn btn-success" >Aggiungi</a>
</div>

<h4><?= "Trovate " . $countCountries . " nazioni" ?></h4>

<table class = "table table-hover table-bordered">
  <thead>
    <tr>
      <th>Code</th><th>Name</th><th>Population</th>
      <th></th><th></th><th></th>
    </tr>
  </thead>
  <tbody>
    <?PHP
    
  //  print_r($countries);die();
    foreach($countries as $country){

      echo "<tr>";
      echo "<td>" . $country['code'] . "</td>";
      echo "<td>" . $country['name'] . "</td>";
      echo "<td>" . $country['population'] . "</td>";

      echo "<td><a href='index.php?r=country/view&id=" . $country['code'] .  "'>
      <i class ='fa fa-eye'></i></a></td>";

      echo "<td><a href='index.php?r=country/update&id=" . $country['code'] .  "'>
      <i class ='fa fa-pencil'></i></a></td>";

      echo "<td><a href='index.php?r=country/delete&id=" . $country['code'] .  "'>
      <i class ='fa fa-times'></i></a></td>";
      
      echo "</tr>";
    }
  ?>
</tbody>
</table>

<?PHP
    //Aggiungo il widget per la paginazione
    use yii\widgets\LinkPager;

    	echo LinkPager::widget([
    		 	'pagination'=>$pagination,
    		]);
?>
