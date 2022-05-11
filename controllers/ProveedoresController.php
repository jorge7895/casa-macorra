<?php

namespace app\controllers;
use Yii;
use app\models\Proveedores;
use app\models\TelefonosProveedores;
use Codeception\Command\Console;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\db\Expression;
use yii\data\ActiveDataProvider;

/**
 * ProveedoresController implements the CRUD actions for Proveedores model.
 */
class ProveedoresController extends Controller
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
     * Lists all Proveedores models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $expresion = new Expression('proveedores.id as id,nombre, nif, GROUP_CONCAT(telefono SEPARATOR ", ") as telefono');
        $query = (new \yii\db\Query())->select($expresion)
                ->from('proveedores')
                ->join('LEFT JOIN', 'telefonos_proveedores', 'proveedores.id = telefonos_proveedores.id_proveedor')
                ->groupBy('nif');
        $gridColumns = [
            [
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'nombre',
                'label'=>'Nombre',
                'hAlign' => 'center', 
                'vAlign' => 'middle',
            ],
            [                
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'telefono',
                'label'=>'Telefono/s',
                'hAlign' => 'center', 
                'vAlign' => 'middle',
            ],
            [                
                'class'=>'kartik\grid\DataColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'attribute' => 'nif',
                'label'=>'NIF',
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
            'gridColumns'=>$gridColumns,
        ]);
    }

    /**
     * Displays a single Proveedores model.
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
     * Creates a new Proveedores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Proveedores();

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
     * Updates an existing Proveedores model.
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
     * Deletes an existing Proveedores model.
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
     * Finds the Proveedores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Proveedores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Proveedores::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
