<?php

namespace app\controllers;

use app\models\Productos;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\Url;
/**
 * ProductosController implements the CRUD actions for Productos model.
 */
class ProductosController extends Controller
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
     * Lists all Productos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new \app\models\ProductosSearch();
        $query = Productos::find();
        $gridColumns = [
            [
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'nombre',
                'label'=>'Nombre',
                'pageSummary'=>'Inversión total',
                'pageSummaryOptions' => ['colspan' => 2],
                'hAlign' => 'center', 
                'vAlign' => 'middle',
            ],
            [                
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'precio_compra',
                'label'=>'Precio de compra',
                'hAlign' => 'center', 
                'vAlign' => 'middle',
            ],
            [                
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'stock',
                'label'=>'Stock Disponible',
                'hAlign' => 'center', 
                'vAlign' => 'middle',
            ],
            [
                'class'=>'kartik\grid\FormulaColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'value' => function ($model, $key, $index, $widget) { 
                    $p = compact('model', 'key', 'index');
                    return $widget->col(1, $p) * $widget->col(2, $p);
                },
                'header'=>'Inversión',
                'headerOptions' => ['class' => 'kartik-sheet-style'],
                'format' => ['decimal', 2],
                'hAlign' => 'center', 
                'vAlign' => 'middle',
                'pageSummary'=>true,
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'dropdown' => 'dropdown',
                'dropdownOptions' => ['class' => 'float-center'],
                'urlCreator' => function($action, $model, $key, $index) { 
                    return Url::toRoute([$action, 'id' => $model['id']]); 
                },
                'viewOptions' => ['title' => 'Ver en detalle', 'data-toggle' => 'tooltip'],
                'updateOptions' => ['title' => 'Modificar registro', 'data-toggle' => 'tooltip'],
                'deleteOptions' => ['title' => 'Eliminar', 'data-toggle' => 'tooltip'],
                'headerOptions' => ['class' => 'kartik-sheet-style'],
            ],
        ];
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
           
            'pagination' => [
                'pageSize' => 10
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
            'searchModel'=>$searchModel,
            'gridColumns'=>$gridColumns,
        ]);
    }

    /**
     * Displays a single Productos model.
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
     * Creates a new Productos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Productos();

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
     * Updates an existing Productos model.
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
     * Deletes an existing Productos model.
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
     * Finds the Productos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Productos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Productos::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
