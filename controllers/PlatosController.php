<?php

namespace app\controllers;

use app\models\Categorias;
use app\models\Platos;
use app\models\Productos;
use \app\models\ProductosEnPlatos;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlatosController implements the CRUD actions for Platos model.
 */
class PlatosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Platos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        //select p.id, p.nombre, c.nombre, p.precio_publico, p.coste from categorias c inner join platos p on c.id = p.categoria
        $dataProvider = new ActiveDataProvider([
            'query' => Platos::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Platos model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
      
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Platos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Platos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['receta']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Platos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Platos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['receta']);
    }

    /**
     * Finds the Platos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Platos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Platos::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('La página solicitada no existe');
    }
    
    public function actionReceta() {
        
        $dataProvider = new ActiveDataProvider([
            'query' => Platos::find(),
        ]);
        
        return $this->render('vistaPlatos',[
           'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionMostrarrecetas(){
        $platos = new ActiveDataProvider([
            'query' => Platos::find(),
        ]);
        
        $ingredientes = new ActiveDataProvider([
           'query'=> ProductosEnPlatos::find()->joinWith('productos'),
        ]);
        
        return $this->render('vistaPlatos',[
           'datos' => [
               'platos'=>$platos,
               'ingredientes'=>$ingredientes,
               ],
        ]);
    }
}
