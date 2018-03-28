<?php

namespace app\controllers;

use Yii;
use app\models\ArticuloSucursal;
use app\models\ArticuloSucursalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Articulos;

/**
 * ArticuloSucursalController implements the CRUD actions for ArticuloSucursal model.
 */
class ArticuloSucursalController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all ArticuloSucursal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticuloSucursalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArticuloSucursal model.
     * @param integer $sku
     * @param integer $id_sucursales
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($sku, $id_sucursales)
    {
        $modelArticulos = Articulos::findOne($sku);
        
        return $this->render('view', [
            'model' => $this->findModel($sku, $id_sucursales), 'modelArticulos' => $modelArticulos,
        ]);
    }

    /**
     * Creates a new ArticuloSucursal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArticuloSucursal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'sku' => $model->sku, 'id_sucursales' => $model->id_sucursales]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ArticuloSucursal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $sku
     * @param integer $id_sucursales
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($sku, $id_sucursales)
    {
        $model = $this->findModel($sku, $id_sucursales);
      
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'sku' => $model->sku, 'id_sucursales' => $model->id_sucursales]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ArticuloSucursal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $sku
     * @param integer $id_sucursales
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($sku, $id_sucursales)
    {
        $this->findModel($sku, $id_sucursales)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArticuloSucursal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.  
     * @param integer $sku
     * @param integer $id_sucursales
     * @return ArticuloSucursal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($sku, $id_sucursales)
    {
        if (($model = ArticuloSucursal::findOne(['sku' => $sku, 'id_sucursales' => $id_sucursales])) !== null) {
            return $model;
        }
    
        throw new NotFoundHttpException('The requested page does not exist.');
    }
   
    
    
}
