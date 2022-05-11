<?php

namespace app\controllers;

use app\models\Comandas;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Productos;
use yii\db\Expression;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        $ingresos = $this->ingresos();
        $bajoStock = $this->bajoStock();
        $masVendidos = $this->masVendidos();
        $gastosMensuales = $this->gastosMensuales();
        $ventasMensuales = $this->ventasMensuales();
        return $this->render('index.php',[
            'ingresos'=>$ingresos,
            'dataBajoStock'=>$bajoStock,
            'masVendidos'=>$masVendidos,
            'ventasMensuales'=>$ventasMensuales,
            'gastosMensuales'=>$gastosMensuales
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function ingresos(){
        $expresion = new Expression("select sum(cantidad*precio_total) as cantidad, elt(MONTH(fecha),'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre') as mes, year(fecha) as year from comandas group by mes, year order by fecha desc limit 12");
        $query = Yii::$app->db->createCommand($expresion)->queryAll();
 

        return $query;
    }

    public function bajoStock(){
        $query = (new \yii\db\Query())->select('nombre , stock')
                ->from('productos')
                ->orderBy('stock asc')
                ->limit(5);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false
        ]);

        return $dataProvider;
    }

    public function masVendidos(){
        $expresion = new Expression("select platos.nombre as nombre, sum(cantidad) as cantidad from comandas left join platos on comandas.id_plato = platos.id group by nombre order by cantidad desc limit 5");
        $query = Yii::$app->db->createCommand($expresion)->queryAll();
        return $query;
    }

    

    public function ventasMensuales(){
        $expresion = new Expression("select sum(precio_total*cantidad) as total from comandas where month(fecha) = month(curdate())");
        $query = Yii::$app->db->createCommand($expresion)->queryAll();
        return $query;
    }

    public function gastosMensuales(){
        $expresion = new Expression("select sum((productos.precio_compra * pedidos.cantidad)-(productos.precio_compra * pedidos.cantidad) *(descuento/100)) as total from pedidos left join productos on pedidos.id_producto = productos.id where month(fecha) = month(curdate())");
        $query = Yii::$app->db->createCommand($expresion)->queryAll();
        return $query;
    }
}
