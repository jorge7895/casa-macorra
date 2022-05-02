<?php

namespace app\controllers;

use app\models\Pedidos;
use app\models\PedidosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

use yii\helpers\Url;
use yii\db\Expression;

/**
 * PedidosController implements the CRUD actions for Pedidos model.
 */
class PedidosController extends Controller
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
     * Lists all Pedidos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PedidosSearch();
        $expresion = new Expression('pedidos.id,productos.nombre as producto, pedidos.cantidad as cantidad, productos.precio_compra as precio, pedidos.descuento as descuento, proveedores.nombre as proveedor, pedidos.fecha as fecha');
        $query = (new \yii\db\Query())->select($expresion)
                ->from('pedidos')
                ->join('LEFT JOIN', 'productos', 'pedidos.id_producto = productos.id')
                ->join('LEFT JOIN', 'proveedores', 'pedidos.id_proveedor = proveedores.id')
                ->orderBy('fecha desc');
        $gridColumns = [
            [
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'producto',
                'label'=>'Producto',
                'pageSummary'=>'Gasto total',
                'pageSummaryOptions' => ['colspan' => 4],
                'hAlign' => 'center', 
                'vAlign' => 'middle',
            ],
            [                
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'cantidad',
                'label'=>'Cantidad',
                'hAlign' => 'center', 
                'vAlign' => 'middle',
            ],
            [                
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'precio',
                'label'=>'Precio',
                'hAlign' => 'center', 
                'vAlign' => 'middle',
            ],
            [                
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'descuento',
                'label'=>'Descuento %',
                'hAlign' => 'center', 
                'vAlign' => 'middle',
            ],
            [
                'class'=>'kartik\grid\FormulaColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'value' => function ($model, $key, $index, $widget) { 
                    $p = compact('model', 'key', 'index');
                    return ($widget->col(1, $p) * $widget->col(2, $p))-(($widget->col(1, $p) * $widget->col(2, $p))*($widget->col(3, $p)/100));
                },
                'header'=>'Coste',
                'headerOptions' => ['class' => 'kartik-sheet-style'],
                'format' => ['decimal', 2],
                'hAlign' => 'center', 
                'vAlign' => 'middle',
                'pageSummary'=>true,
            ],
            [                
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'proveedor',
                'label'=>'Proveedor',
                'hAlign' => 'center', 
                'vAlign' => 'middle',
                'pageSummaryOptions' => ['colspan' => 3],
            ],
            [                
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'fecha',
                'label'=>'Fecha de compra',
                'format'=>['date', 'php:d-M-Y'], 
                'hAlign' => 'center', 
                'vAlign' => 'middle',
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
     * Displays a single Pedidos model.
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
     * Creates a new Pedidos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pedidos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pedidos model.
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
     * Deletes an existing Pedidos model.
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
     * Finds the Pedidos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Pedidos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pedidos::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionMes() {
        $searchModel = new PedidosSearch();
        $expresion = new Expression("sum(pedidos.cantidad) as cantidad, sum((productos.precio_compra * pedidos.cantidad)-(productos.precio_compra * pedidos.cantidad) *(descuento/100)) as precio, elt(MONTH(fecha),'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre') as mes,year(fecha) as año");
        $query = (new \yii\db\Query())->select($expresion)
                ->from('pedidos')
                ->join('LEFT JOIN', 'productos', 'pedidos.id_producto = productos.id')
                ->groupBy('month(fecha), year(fecha)')
                ->orderBy('año desc, fecha asc');
        $gridColumns = [
            [                
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'mes',
                'label'=>'Mes de compra',
                'hAlign' => 'center', 
                'vAlign' => 'middle',
                'pageSummaryOptions' => ['colspan' => 2],
            ],
            [                
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'año',
                'label'=>'Año de compra',
                'hAlign' => 'center', 
                'vAlign' => 'middle',
            ],
            [                
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'cantidad',
                'label'=>'Cantidad de productos',
                'hAlign' => 'center', 
                'vAlign' => 'middle',
                'pageSummary'=>'Gasto total:',
                'pageSummaryOptions' => ['colspan' => 1],
            ],
            [                
                'class'=>'kartik\grid\FormulaColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'precio',
                'label'=>'Coste',
                'hAlign' => 'center', 
                'vAlign' => 'middle',
                'format' => ['decimal', 2],
                'pageSummary'=>true,
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
    
        public function actionYear() {
        $searchModel = new PedidosSearch();
        $expresion = new Expression("sum(pedidos.cantidad) as cantidad, sum((productos.precio_compra * pedidos.cantidad)-(productos.precio_compra * pedidos.cantidad) *(descuento/100)) as precio, year(fecha) as año");
        $query = (new \yii\db\Query())->select($expresion)
                ->from('pedidos')
                ->join('LEFT JOIN', 'productos', 'pedidos.id_producto = productos.id')
                ->join('LEFT JOIN', 'proveedores', 'pedidos.id_proveedor = proveedores.id')
                ->groupBy('year(fecha)')
                ->orderBy('año desc');
        $gridColumns = [
            [                
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'año',
                'label'=>'Año de compra',
                'hAlign' => 'center', 
                'vAlign' => 'middle',
                'pageSummaryOptions' => ['colspan' => 1],
            ],
            [                
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'cantidad',
                'label'=>'Cantidad de productos',
                'hAlign' => 'center', 
                'vAlign' => 'middle',
                'pageSummary'=>'Gasto total:',
                'pageSummaryOptions' => ['colspan' => 1],
            ],
            [                
                'class'=>'kartik\grid\FormulaColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'precio',
                'label'=>'Coste',
                'hAlign' => 'center', 
                'vAlign' => 'middle',
                'format' => ['decimal', 2],
                'pageSummary'=>true,
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
}
