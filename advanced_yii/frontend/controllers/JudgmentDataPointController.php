<?php

namespace frontend\controllers;

use Yii;
use frontend\models\JudgmentDataPoint;
use frontend\models\JudgmentDataPointSearch;
use frontend\models\ElementMast;
use frontend\models\JudgmentElement;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * JudgmentDataPointController implements the CRUD actions for JudgmentDataPoint model.
 */
class JudgmentDataPointController extends Controller
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
     * Lists all JudgmentDataPoint models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JudgmentDataPointSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JudgmentDataPoint model.
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
     * Creates a new JudgmentDataPoint model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new JudgmentDataPoint();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }*/


    
    /*dynamic form creation code*/
     public function actionCreate($jcode="",$doc_id="")
    {
        $username = \Yii::$app->user->identity->username;
       $count = count(Yii::$app->request->post('JudgmentDataPoint', []));
       $models = [new JudgmentDataPoint()];
       for($i = 1; $i < $count; $i++) {
            $models[] = new JudgmentDataPoint();
        }
       if (Model::loadMultiple($models, Yii::$app->request->post()) && Model::validateMultiple($models))
        {
            
         foreach ($models as $model) {
            $model->judgment_code = $jcode;
            $model->username = $username;
            //Try to save the models. Validation is not needed as it's already been done.
            $model->save(false);
            }
            return $this->redirect('index');
        }

        return $this->render('create', [
            'models' => $models,
        ]);
    }
     /*end of dynamic form creation code*/

     /*----------------------------------------------*/
     /*----------------------------------------------*/
     /*----------------------------------------------*/
     /*----------------------------------------------*/

     /* dynamic form creation code with dropdown*/
     public function actionCreate1($jcode="",$doc_id="")
    {
        $username = \Yii::$app->user->identity->username;
       $count = count(Yii::$app->request->post('JudgmentDataPoint', []));

       $models = [new JudgmentDataPoint()];
       for($i = 1; $i < $count; $i++) {
            $models[] = new JudgmentDataPoint();
        }
       if (Model::loadMultiple($models, Yii::$app->request->post()))
        {
            
            
         foreach ($models as $model) {
            $element = new ElementMast();
            $element_name =  $element->getElementName($model->element_code);
            $model->element_name = $element_name ;
            $model->judgment_code = $jcode;
            $model->doc_id = $doc_id;
            $model->username = $username;
            //Try to save the models. Validation is not needed as it's already been done.
            $model->save(false);
            }
            return $this->redirect('index');
        }

        return $this->render('create1', [
            'models' => $models,
        ]);
    }
    /*end of nested dynamic form creation code with dropdown*/

    /* dynamic form creation code with dropdown*/
     public function actionCreate1bkup($jcode)
    {
       $count = count(Yii::$app->request->post('JudgmentDataPoint', []));

       $models = [new JudgmentDataPoint()];
       for($i = 1; $i < $count; $i++) {
            $models[] = new JudgmentDataPoint();
        }
       if (Model::loadMultiple($models, Yii::$app->request->post()))
        {
            //print_r($models);die;
         foreach ($models as $model) {
            $model->judgment_code = $jcode;
            //Try to save the models. Validation is not needed as it's already been done.
            $model->save(false);
            }
            return $this->redirect('index');
        }

        return $this->render('create1', [
            'models' => $models,
        ]);
    }
    /*end of nested dynamic form creation code with dropdown*/

    /**
     * Updates an existing JudgmentDataPoint model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
   /* public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
*/
    public function actionUpdate($jcode="")
    {
        
        //$models = JudgmentDataPoint::find()->indexBy('id')->all();
        $models = JudgmentDataPoint::find()->where(['judgment_code' => $jcode])->all();

        if (Model::loadMultiple($models, Yii::$app->request->post()) && Model::validateMultiple($models)) {
            foreach ($models as $model) {
                
                $model->save(false);
            }
            return $this->redirect('index');
        }

        return $this->render('update', ['models' => $models,'jcode'=>$jcode]);
    }


     /*dynamic form with dropdown from scratch*/
    public function actionCreateDp($jcode)
    {
        $username = \Yii::$app->user->identity->username;
        $models = new JudgmentDataPoint();
        if ($models->load(Yii::$app->request->post())) {

        $count =  count($_POST['JudgmentDataPoint']['element_code']);
        for($i = 0; $i < $count; $i++) {

        $models = new JudgmentDataPoint();
        $models->judgment_code = $jcode;
       // $models->doc_id = $doc_id;
        $models->username = $username;
        $models->element_code = $_POST['JudgmentDataPoint']['element_code'][$i];
        $models->data_point = $_POST['JudgmentDataPoint']['data_point'][$i];
        $models->weight_perc = $_POST['JudgmentDataPoint']['weight_perc'][$i];
        $models->save(false);
        }
       }
        return $this->render('createdp', [
            'models' => $models,
        ]);
 
    }

       /*dynamic form with dropdown from scratch*/

    /* dynamic form updation code with dropdown*/
    public function actionUpdate1($jcode="",$doc_id="")
    {
        $username = \Yii::$app->user->identity->username;
        //$models = JudgmentDataPoint::find()->indexBy('id')->all();
        $models = JudgmentDataPoint::find()->where(['judgment_code' => $jcode])->all();

        if (Model::loadMultiple($models, Yii::$app->request->post()) && Model::validateMultiple($models)) {
            foreach ($models as $model) {
                $element = new ElementMast();
            $element_name =  $element->getElementName($model->element_code);
            $model->element_name = $element_name ;
            $model->username = $username;
                $model->save(false);
            }
            return $this->redirect('index');
        }

        return $this->render('update1', ['models' => $models,'jcode'=>$jcode,'doc_id'=>$doc_id]);
    }
    /* end of dynamic form updation code with dropdown*/

    public function actionDp($id)
    {
      $element = JudgmentElement::find()->select(['element_text'])->where(['element_code'=>'$id'])->asArray()->all();
     $result = Json::encode($element);

     return $result;   
    }


    /**
     * Deletes an existing JudgmentDataPoint model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JudgmentDataPoint model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JudgmentDataPoint the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JudgmentDataPoint::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
