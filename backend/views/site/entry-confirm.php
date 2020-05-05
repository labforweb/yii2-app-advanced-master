<h1 class= "jumbotron">Corso Yii2</h1>
<h2>Hai inviato:</h2>

<?PHP
//print_r($_REQUEST['EntryForm']['name']);die();

$db = Yii::$app->db;

//print_r($db->username);

echo "<h3>" . $model->name . "</h3>";
echo "<h3>" . $model->email . "</h3>";
echo "<h3>" . $model->address . "</h3>";

$userId = Yii::$app->user->getId(); //id dell'utente attivo, nella tabella user
//$queryUserId=User::find()->where(['id' => $userId])->one();
//il record dello user attivo espresso come array associativo
//$username=$queryUserId['username'];
//echo $username;


?>
