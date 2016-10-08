<?php
namespace International\Model;
use Common\Model\HyAllModel;

/**
 * 留学生成绩打印管理模型
 *
 * @author
 */
class InternationalPrintModel extends HyAllModel {

    /**
     * @overrides
     */
    protected function initTableName(){
        return 'student';
    }

    /**
     * @overrides
     */
    protected function initInfoOptions() {
        return array (
            'title' => '留学生',
            'subtitle' => '留学生的课程与成绩打印'
        );
    }
    /**
     * @overrides
     */
    protected function initSqlOptions() {
        return  array (
            'associate' => array (
                'user|user_id|id|name AS user_name||left',
                'class|class_id|id|name AS class_name||left'
            ),
            'where' => array (
                'user.country'=>array('neq','中国'),
				'status' => array('lt',9)
            )
        ) ;
    }
    /**
     * @overrides
     */
    protected function initPageOptions() {
        return  array (
            'order'=>'user_id',
            'detailTpl'=>'InternationalPrint/detail',
            'actions' 	=> array (

            ),
            'buttons'	=> array(
            )
        ) ;
    }
    /**
     * @overrides
     */
    protected function initFieldsOptions() {
        return array (
            'user_id' => array (
                'title' => '姓名',
                'list'=>array(
//							'callback'=>array('tplReplace','{callback}'=>array('{:user_name}'),C('TPL_DETAIL_BTN'),'{#}'),
                    'callback'=>array('tplReplace','{callback}'=>array('value','{:user_name}'),C('TPL_DETAIL_BTN'),'{#}'),
                ),
            ),
            'class_id' => array (
                'title' => '班级',
                'list'=>array(
                    'callback'=>array('value','{:class_name}'),
                ),
            ),
            'status' => array (
                'title' => '状态',
                'list' => array (
                    'width' => '30',
                    'callback' => array('status')
                )
            )
        );
    }

    public function detail($pk){
        $arr1=M('score')->alias('s')
            ->join('edu_user as u ON u.id=s.stu_id')
            ->join('edu_exam_course as e ON e.id=s.course_id')
            ->where(array('s.status'=>1,'stu_id'=>$pk))->order('year asc')
            ->field('s.course_id,stu_id,score,year,term,country,u.name AS user_name,u.english_name,u.birth,u.admission_time,u.user_no,e.name AS course_name,credit')->select();
        $arr2=M('student')->alias('st')
            ->join('edu_class as c ON c.id=st.class_id')->where(array('st.status'=>1,'user_id'=>$pk))->field('name as class_name,grade')->find();
        $day=date('Y-m-d',time());
        foreach($arr1 as $k=>$vo){
            $arr1[$k]['class_name']=$arr2['class_name'];
            $arr1[$k]['grade']=$arr2['grade'];
            $arr1[$k]['admission_time']=date('Y年m月',$vo['admission_time']);
            $arr1[$k]['birth']=date('Y-m-d',$vo['birth']);
        }
        $arr1[0]['cn_time']=$day;
//        dump($arr1);
        return $arr1;
    }
}