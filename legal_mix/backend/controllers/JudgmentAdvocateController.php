<?php

namespace backend\controllers;

use Yii;
use backend\models\JudgmentAdvocate;
use backend\models\JudgmentMast;
use backend\models\JudgmentAdvocateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
/**
 * JudgmentAdvocateController implements the CRUD actions for JudgmentAdvocate model.
 */
class JudgmentAdvocateController extends Controller
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
                    'view' => ['POST'],
                    'view' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all JudgmentAdvocate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JudgmentAdvocateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JudgmentAdvocate model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new JudgmentAdvocate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($jcount="",$jyear="",$jcode="")
    {
            $model = new JudgmentAdvocate();        
            $check = JudgmentMast::find()->select('jcount,jyear,judgment_code')->where(['!=','jcount','completed'])->andWhere(['jyear'=>$jyear])->one();

            /*$jm    = JudgmentMast::find()->where(['judgment_code'=>$check->judgment_code])->one();
            print_r($jm);
            exit();*/
            if(!empty($check))
            {
                $count = $check->jcount;
                $year = $check->jyear;               
            if($count==1){
                Yii::$app->session->setFlash('Please Complete All Pages');
                return $this->redirect(['judgment-act/create', 'jcount' => 1,'jyear'=>$year,'jcode'=>$jcode]);
            }
/*            if($count==2) {
                Yii::$app->session->setFlash('Please Complete All Pages');
                return $this->redirect(['judgment-advocate/create', 'jcount' => 2,'jyear'=>$year,'jcode'=>$jcode]);                 
            }*/
            elseif($count==3) {
                Yii::$app->session->setFlash('Please Complete All Pages');
                return $this->redirect(['judgment-citation/create', 'jcount' => 3,'jyear'=>$year,'jcode'=>$jcode]);                 
            }       
            elseif($count==4) {
                Yii::$app->session->setFlash('Please Complete All Pages');
                return $this->redirect(['judgment-ext-remark/create', 'jcount' => 4,'jyear'=>$year,'jcode'=>$jcode]);                   
            }       
            elseif($count==5) {
                Yii::$app->session->setFlash('Please Complete All Pages');
                return $this->redirect(['judgment-judge/create', 'jcount' => 5,'jyear'=>$year,'jcode'=>$jcode]);                    
            }       
            elseif($count==6) {
                Yii::$app->session->setFlash('Please Complete All Pages');
                return $this->redirect(['judgment-parties/create', 'jcount' => 6,'jyear'=>$year,'jcode'=>$jcode]);                  
                }
            elseif($count==7) {
                Yii::$app->session->setFlash('Please Complete All Pages');
                return $this->redirect(['judgment-overrules/create', 'jcount' => 7,'jyear'=>$year,'jcode'=>$jcode]);                  
                }
          elseif($count==8) {
                Yii::$app->session->setFlash('Please Complete All Pages');
                return $this->redirect(['judgment-overruledby/create', 'jcount' => 8,'jyear'=>$year,'jcode'=>$jcode]);                  
                }
           elseif($count==9) {
                Yii::$app->session->setFlash('Please Complete All Pages');
                return $this->redirect(['judgment-ref/create', 'jcount' => 9,'jyear'=>$year,'jcode'=>$jcode]);                  
                }
            elseif($count==10) {
                Yii::$app->session->setFlash('Please Complete All Pages');
                return $this->redirect(['judgment-cited-by/create', 'jcount' => 10,'jyear'=>$year,'jcode'=>$jcode]);                  
                }                                                       
            }
        if ($model->load(Yii::$app->request->post())) {
            $count =  count($_POST['JudgmentAdvocate']['advocate_flag']);
            //$judgmentAdvocate = $_POST['JudgmentAdvocate']['judgment_code'];
            
            for($i=0;$i<$count;$i++)
            {
            $model = new JudgmentAdvocate();
            $model->judgment_code = $jcode;
            $model->advocate_flag = $_POST['JudgmentAdvocate']['advocate_flag'][$i];
            $model->advocate_name = $_POST['JudgmentAdvocate']['advocate_name'][$i];
            // $judgment_code = $_POST['JudgmentAdvocate']['judgment_code']; 
            $model->save(); 
            }


            if($jyear!="" && $jcount!=""){ 
            \Yii::$app->db->createCommand("UPDATE judgment_mast SET jcount=3 WHERE judgment_code=".$jcode."")->execute();
            
                Yii::$app->session->setFlash('Created successfully!!');
            return $this->redirect(['judgment-citation/create', 'jcount' => 3,'jyear'=>$year,'jcode'=>$jcode ]);            
                }
                else{
                return $this->redirect(['judgment-mast/judgmentupdate', 'code'=>$jcode ]);                    
                }

           
            }
            //return $this->redirect(['index']);
         else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
        public function actionNextPage($jcode="",$jcount="",$jyear="")
    {
        \Yii::$app->db->createCommand("UPDATE judgment_mast SET jcount=3 WHERE judgment_code=".$jcode."")->execute();
        Yii::$app->session->setFlash('Created successfully!!');
        return $this->redirect(['judgment-citation/create', 'jcount' => 3,'jyear'=>$jyear,'jcode'=>$jcode ]);            
    }


    /**
     * Updates an existing JudgmentAdvocate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($jcount="",$jyear="",$jcode="")
    {
          $model =  JudgmentAdvocate::find()->where(['judgment_code'=>$jcode])->one();    
        //$model = $this->findModel($id);
        $judgmentAdvocate =$model->judgment_code;
        $adv = new JudgmentAdvocate();
        if($adv->load(Yii::$app->request->post())) {
            //$count = count($_POST['JudgmentAdvocate']['advocate_flag']);
            \Yii::$app
            ->db
            ->createCommand()
            ->delete('judgment_advocate', ['judgment_code' => $jcode])
            ->execute();

          //$jcode =  JudgmentAdvocate::deleteAll()->where('judgment_code = :judgment_code', [':judgment_code' => $jcode]);    
         $count =  count($_POST['JudgmentAdvocate']['advocate_flag']);                

            for($i=0;$i<$count;$i++)
            {
           /* if($_POST['JudgmentAdvocate']['id'][$i] == '')
            {*/
               /* echo $_POST['JudgmentAdvocate']['id'][$i];
                exit();*/
            $advocate = new JudgmentAdvocate();
            $advocate->judgment_code  = $judgmentAdvocate;
            $advocate->advocate_flag = $_POST['JudgmentAdvocate']['advocate_flag'][$i];
            $advocate->advocate_name = $_POST['JudgmentAdvocate']['advocate_name'][$i];                        
            $advocate->save(); 
           /* }
            else
            {
                $advocate = JudgmentAdvocate::find()->where(['id'=>$_POST['JudgmentAdvocate']['id'][$i]])->one();
                $advocate->judgment_code  = $judgmentAdvocate;
                $advocate->advocate_flag = $_POST['JudgmentAdvocate']['advocate_flag'][$i];
                $advocate->advocate_name = $_POST['JudgmentAdvocate']['advocate_name'][$i];            
                $advocate->save(); 
            }*/
         }
          if($jyear!="" && $jcount!=""){ 
              Yii::$app->getSession()->setFlash('success',' Updated Successfully'); 
                        return $this->redirect(['index']);        
                }
                else{
                Yii::$app->session->setFlash('Updated successfully!!');
                 $this->redirect(['judgment-mast/judgmentupdate', 'code'=>$jcode ]);                    
                }  


           
        }
         else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing JudgmentAdvocate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = JudgmentAdvocate::findOne($id);
        \Yii::$app->db
    ->createCommand()
    ->delete('judgment_advocate', ['judgment_code' =>$model->judgment_code])
    ->execute();
         Yii::$app->getSession()->setFlash('info','Deleted Successfully');      
        //$this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionDeleteall($jcode)
    {
        \Yii::$app->db
    ->createCommand()
    ->delete('judgment_advocate', ['judgment_code' =>$jcode])
    ->execute();
         Yii::$app->getSession()->setFlash('info','Deleted Successfully');      
    $this->redirect(['judgment-mast/judgmentupdate', 'code'=>$jcode ]);                    
    }
    public function actionDeleteOne($id)
    {

    	

        $this->findModel($id)->delete();
        Yii::$app->getSession()->setFlash('info','Deleted Successfully');      
        return $this->redirect(['index']);
    }

    /**
     * Finds the JudgmentAdvocate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JudgmentAdvocate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionAdvocate($id)
    {
     $state = JudgmentMast::find()->select(['respondant_adv','respondant_adv_count','appellant_adv','appellant_adv_count'])->where(['judgment_code'=>$id])->asArray()->one();
     $result = Json::encode($state);
     return $result;       
        //return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = JudgmentAdvocate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
