<?php

namespace app\controllers;

use app\models\Users;
use app\models\UsersSearch;
use app\models\Compare;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;



/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
  
    /**
     * @inheritDoc
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
     * Lists all Users models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    { 
        $model = $this->findModel($id);

        $model1 = new Compare;

        $model1->load(\Yii::$app->request->post());
        
        if ($model1->validate()) {
         if($model->email === $model1->username && $model->password === $model1->password){
         return $this->render('view', ['model' => $model]);
          }  
          if($model->email !== $model1->username || $model->password !== $model1->password){
            return $this->render('incorrect');

          }           
             }
else{
    return $this->render('check', ['model1' => $model1]);

}
       
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Users model.
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
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        
            if($model->access =='admin'){
            $this->findModel($id)->delete();
           }
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

   
}