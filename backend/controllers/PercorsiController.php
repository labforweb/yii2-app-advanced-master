<?php

namespace backend\controllers;

use Yii;
use app\models\Percorsi;
use app\models\PercorsiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;


/**
 * PercorsiController implements the CRUD actions for Percorsi model.
 */
class PercorsiController extends Controller
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
     * Lists all Percorsi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PercorsiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Percorsi model.
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
     * Creates a new Percorsi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        //se io sono un utente che può fare questa azione allora la faccio
        
        if(Yii::$app->user->can('create-percorsi')){
            $model = new Percorsi();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_percorso]);
            }
    
            return $this->render('create', [
                'model' => $model,
            ]);
        }else{

            throw new ForbiddenHttpException();

        }

        

        //altrimenti faccio rilevare un errore di tipo "FORBIDDEN"
    }

    /**
     * Updates an existing Percorsi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        
        if(Yii::$app->user->can('update-percorsi')){    
    
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_percorso]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);

        }else{

            throw new ForbiddenHttpException();

        }
    }

    /**
     * Deletes an existing Percorsi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('delete-percorsi')){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{

            throw new ForbiddenHttpException();

        }
    }

    /**
     * Finds the Percorsi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Percorsi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Percorsi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
