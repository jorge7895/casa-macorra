<?php

namespace app\controllers;
use Yii;
use app\models\Categorias;
use app\models\postCategorias;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

use yii\helpers\Url;

/**
 * CategoriasController implements the CRUD actions for Categorias model.
 */
class CategoriasController extends Controller
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
     * Lists all Categorias models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new postCategorias();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        $gridColumns = [
        
            [
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'nombre',
                'label'=>'Nombre',
                'pageSummary'=>'Total',
                'pageSummaryOptions' => ['colspan' => 6],
                'header'=>'',
                'headerOptions'=>['class'=>'kartik-sheet-style'],
                'hAlign' => 'center', 
                'vAlign' => 'middle',
            ],        
            [
                'class' => 'kartik\grid\ActionColumn',
                    'dropdown' => 'dropdown',
                    'dropdownOptions' => ['class' => 'float-center'],
                    'urlCreator' => function($action, $model, $key, $index) { 
                        return Url::toRoute([$action, 'id' => $model->id]); 
                    },
                    'viewOptions' => ['title' => 'Ver en detalle', 'data-toggle' => 'tooltip'],
                    'updateOptions' => ['title' => 'Modificar registro', 'data-toggle' => 'tooltip'],
                    'deleteOptions' => ['title' => 'Eliminar', 'data-toggle' => 'tooltip'],
                    'headerOptions' => ['class' => 'kartik-sheet-style'],
            ],
];

    // non-ajax - render the grid by default
    return $this->render('index', [
        'dataProvider' => $dataProvider,
        'searchModel' => $searchModel,
        'gridColumns'=>$gridColumns
    ]);
    }

    /**
     * Displays a single Categorias model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Categorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Categorias();

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
     * Updates an existing Categorias model.
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
     * Deletes an existing Categorias model.
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
     * Finds the Categorias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Categorias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categorias::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
