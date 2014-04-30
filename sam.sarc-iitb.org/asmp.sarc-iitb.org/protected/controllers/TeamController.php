<?php

class TeamController extends Controller
{
    protected function allotAlumnus($id=0){
        if($id==0){
            $mAlumnus=Alumnus::model()->with(array(
                'preferredStudents',
                'profDetails',
                'mentorshipPreferences',
                ))->findAll(array(
                        'condition'=>"t.id IN (SELECT alumnusId FROM `AlumnusPreferenceList` WHERE updatedAt!='2011-08-27 06:26:28')", //TODO:KindaShortcut-IfPossibleImprove
                ));
            $this->render('_alumniList',array(
                        'mAlumnus'=>$mAlumnus,
                ));
        }else{
            $mAlumnus=Alumnus::model()->with(array(
                'preferredStudents.student',
                'profDetails',
                'mentorshipPreferences',
            ))->findByPk($id);
            $this->render('allotAlumnus',array(
                        'alumnus'=>$mAlumnus,
                ));
        }
    }

    protected function allotStudent($id=0){
           $mStudent=Student::model()->with(array(
               'preferenceLists',
               'mentorshipPreferences',
           ))->findAll(array(
               'condition'=>"t.id IN (SELECT studentId FROM `StudentPreferenceList`)",
           ));
           $this->render('_studentsList',array(
                        'mStudent'=>$mStudent,
                ));
    }

    protected function allotMain(){
        $this->render('allot');
    }

    public function actionAllot($role='',$id=0)
    {
        //$this->layout=false;
        if($role==='alumnus'){
            $this->allotAlumnus($id);
        }else if($role==='student'){
                $this->allotStudent();
        }else{
                $this->allotMain();
        }
    }


    public function actionLogin()
    {
        $this->render('login');
    }

    public function actionLogout()
    {
        $this->render('logout');
    }

    // Uncomment the following methods and override them if needed
    /*
    public function filters()
    {
        // return the filter configuration for this controller, e.g.:
        return array(
            'inlineFilterName',
            array(
                'class'=>'path.to.FilterClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }

    public function actions()
    {
        // return external action classes, e.g.:
        return array(
            'action1'=>'path.to.ActionClass',
            'action2'=>array(
                'class'=>'path.to.AnotherActionClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }
    */
}
