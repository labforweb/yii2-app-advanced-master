<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use app\models\Country;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;



/**
 * Site controller
 */
class CountryController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [

                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
      $query = Country::find(); //oggetto recordset
      //trova tutti i record della tabella Country

      $pagination = new Pagination([
          'defaultPageSize' => 6,
          'totalCount' => $query->count(),
          ]);

      $countries = $query->orderBy('name')
          ->offset($pagination->offset)
          ->limit($pagination->limit)
          ->all(); //Il metodo → all() trasforma l'oggetto recordset $query in una matrice di array associativi ($countries)

      $sql = "Select count(*) as conteggio from country";
      $db = Yii::$app->db; //istanza del DB che voglio utilizzare
     
     
      /*$countCountries = $db->createCommand($sql)->queryAll();

      print_r($countCountries); 
      echo json_encode($countCountries); //stringa che verrà intercettata da ANGULAR
      echo gettype(json_encode($countCountries));
      
      
      */



      $countCountries = $db->createCommand($sql)->queryScalar();

      /*Oltre al metodo queryScalar(), utilizzato per le query di aggregazione
        esistono i metodi 
        ->queryAll() => restituisce una matrice di array associativi
        ->queryOne() => che ci restituisce un singolo array associativo
      */
       
      $sqlAll= "Select * from country where code = 'AU'";
     
     
      // $countries = Yii::$app->db->createCommand($sqlAll)->queryAll();
      //print_r($countries); die();

      
      //print_r($db->createCommand($sql)->queryScalar()); die();
      
          return $this->render('index', [
          'countries' => $countries,
          'pagination' => $pagination,
          'countCountries' => $countCountries
      ]);


    }

    public function actionView($id){

        
        //$query = Country::find()->where(['code' => $id])->one();
        
        //print_r($query);die();

        return $this->render('view', [
           //'id' => $id,
           //'query' => $query,
           'model' => $this->findModel($id),
        ]);
    }

    
    public function actionCreate(){

        $model = new Country();
        /*se i dati sono stati postati e validati allora
        aggiungi il record i cui dati sono stati postati
        altrimenti fai vedere la form
       */ 

      if ($model->load(Yii::$app->request->post()) ){

       //print_r(Yii::$app->request->post());
       // print_r($model->name);die();
            //insert into
            $model->code = Yii::$app->request->post()['Country']['code'];
            $model->name = Yii::$app->request->post()['Country']['name'];
            $model->population = Yii::$app->request->post()['Country']['population'];

            $model->save();

            $this->redirect(['view', 'id' => $model->code]);

      }else{
        
        return $this->render('create', [
            'model' => $model,
        ]);

      }

    }

    public function actionUpdate($id){

        $model = $this->findModel($id);

        //echo $model->code;die();

        if ($model->load(Yii::$app->request->post()) ){

            $model->code = Yii::$app->request->post()['Country']['code'];
            $model->name = Yii::$app->request->post()['Country']['name'];
            $model->population = Yii::$app->request->post()['Country']['population'];

            $model->save();
            return $this->redirect(['view', 'id' => $model->code]);
        }else{
            return $this->render('update', [
                'model' => $model,
            ]);
    
        }

         

    }
    
    public function actionDelete($id){

        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }


    protected function findModel($id)
    
    {		    
      //findOne permette di estrarre un solo oggetto dall'insieme degli oggetti mappati la classe Country
      
        if (($model = Country::findOne($id)) !== null) {
	        
            return $model;
        
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }




}
