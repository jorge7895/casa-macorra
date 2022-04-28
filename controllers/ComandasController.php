<?php

namespace app\controllers;

use app\models\Comandas;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;

use app\models\Platos;

/**
 * ComandasController implements the CRUD actions for Comandas model.
 */
class ComandasController extends Controller
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
     * Lists all Comandas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new Comandas;
        $query = (new \yii\db\Query())->select('comandas.fecha, platos.nombre, comandas.cantidad')
                ->from('comandas')
                ->join('LEFT JOIN', 'platos', 'comandas.id_plato = platos.id');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
           
            'pagination' => [
                'pageSize' => 20
            ],
            /*
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'gridColumns' => ['fecha','nombre','cantidad']
        ]);
    }

    /**
     * Displays a single Comandas model.
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
     * Creates a new Comandas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Comandas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Comandas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Comandas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Comandas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Comandas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comandas::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    //posible cambio a gridview normal
    public function actionMes()
    {
        $searchModel = new Comandas;
        $expresion = new Expression("year(fecha) as año, elt(MONTH(fecha),'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre') as Mes, concat(sum(cantidad),' platos') as 'Cantidad de platos'");
        $query = (new \yii\db\Query())->select($expresion)
                ->from('comandas')
                ->groupBy('month(fecha), year(fecha)')
                ->orderBy('año desc, fecha asc');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            
            'pagination' => [
                'pageSize' => 10
            ],
             /*
            'sort' => [
                'defaultOrder' => [
                    'año' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'gridColumns' => ['año','Mes','Cantidad de platos']
        ]);
    }
}
