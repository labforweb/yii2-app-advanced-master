<?php

namespace backend\controllers;

use Yii;
use app\models\PercorsiStudente;
use app\models\PercorsiStudenteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PercorsiStudenteController implements the CRUD actions for PercorsiStudente model.
 */
class PercorsiStudenteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PercorsiStudente models.
     * @return mixed
     */
    public function actionIndex()
    {
       /*$sql=  SELECT studenti.*, percorsi.nome_percorso
FROM studenti inner join percorsistudente ON studenti.id_studente = percorsistudente.studenti_id
inner JOIN percorsi ON percorsistudente.percorsi_id = percorsi.id_percorso
        
    SQLDataProvider
*/

        $searchModel = new PercorsiStudenteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PercorsiStudente model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PercorsiStudente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PercorsiStudente();

        if ($model->load(Yii::$app->request->post()) ) { 
            //se i dati sono stati postati
            //dobbiamo controllare se tra i dati postati il percorso che ho scelto
             //non sia stato già scelto dall'utente in questione
             
             //print_r(Yii::$app->request->post()); die();
             
             $dati_postati = Yii::$app->request->post();

             $query = PercorsiStudente::find()
            ->andWhere(['studenti_id' =>$dati_postati['Percorsistudente']['studenti_id']])
            ->andWhere(['percorsi_id' => $dati_postati['Percorsistudente']['percorsi_id']])
            ->One();
            
            //echo count($query);die();

            if(count($query)>0){ //l'utente ha già acquistato il percorso relativo ai dati postati
                //Yii::$app->session->setFlash('Attenzione','Il record già esiste');
                $alert ="Attenzione, l'utente ha già acquistato questo percorso";
                return $this->render('create', [
                    'model' => $model,
                    'alert' =>$alert
                ]);
                
            }else{
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }

            
        }
        $alert = "";
        return $this->render('create', [
            'model' => $model,
            'alert' => $alert
        ]);
    }

    /**
     * Updates an existing PercorsiStudente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        //id dello studente
        $studenti_id = $model->studenti_id;

        if ($model->load(Yii::$app->request->post()) ) 
        {
             //dobbiamo controllare se tra i dati postati il percorso che ho scelto
             //non sia stato già scelto dall'utente in questione
             //print_r(Yii::$app->request->post());//die();
            $dati_postati = Yii::$app->request->post();

            $query = PercorsiStudente::find()
            ->andWhere(['studenti_id' =>$studenti_id])
            ->andWhere(['percorsi_id' => $dati_postati['Percorsistudente']['percorsi_id']])
            ->One();
            
            //print_r($query); die();
                       
            if(count($query)>0){
                $alert ="Attenzione, l'utente ha già acquistato questo percorso";
                return $this->render('update', [
                    'model' => $model,
                    'alert' =>$alert
                ]);
                
            }else{
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }

            
        }
        
        $alert ="";    
        
        return $this->render('update', [
            'model' => $model,
            'alert' =>$alert
        ]);
    }

    /**
     * Deletes an existing PercorsiStudente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PercorsiStudente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PercorsiStudente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PercorsiStudente::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
