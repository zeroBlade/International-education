<?php
namespace GoodCourse\Model;
use Common\Model\HyAllModel;
use System\Model\HyAlertModel;
/**
 * 精品课程管理模型-管理员角色
 *
 * @author
 *
 */
class GoodCourseModel extends HyAllModel {

	/**
	 * @overrides
	 */
	protected function initTableName() {
		return 'good_course';
	}
	/**
	 * @overrides
	 */
	protected function initInfoOptions() {
		return array (
				'title' => '精品课程',
				'subtitle' => '管理所有精品课程信息' 
		);
	}
    /**
     * @overrides
     */
    protected function initSqlOptions() {
        return array (
            'associate' => array (
                'teacher|incharge_id|user_id|user_id||left',
                'user|teacher.user_id|id|name AS incharge_name||left',
                'good_course|id|id|description'

            ),
            'where' => array (
                'status' => array ('lt',9),
//                ''=>array('eq',ss_uid())
            )
        );
    }
	/**
	 * @overrides
	 */
	protected function initPageOptions() {
		return array (
				'checkbox' => true,
				'deleteType' => 'status|9',
				'actions' => array (
						'edit' => array (
								'title' => '审核',
								'max' => 1 
						),
						'delete' => array (
								'title' => '删除',
								'confirm' => true 
						) 
				),
				 'initJS' => array(
//                     'UMEditor'=>json_encode(array(  'source | undo redo | bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
//                         'insertorderedlist insertunorderedlist | selectall cleardoc paragraph | fontfamily fontsize' ,
//                         '| justifyleft justifycenter justifyright justifyjustify |',
//                         'link unlink | emotion image video  | map',
//                         '| horizontal print preview fullscreen', 'drafts', 'formula')
//                     ),
                     'UEditor'=>json_encode(
                         array(
                             'fullscreen', 'source', '|', 'undo', 'redo', '|',
                             'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                             'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                             'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                             'directionalityltr', 'directionalityrtl', 'indent', '|',
                             'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                             'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                             'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
                             'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
                             'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
                             'print', 'preview', 'searchreplace', 'help', 'drafts'
                         )
                     ),
                     'Course'

                 ),
                'buttons'=>array(),
                'formSize'=>'full'
		);
	}

	/**
	 * @overrides
	 */
	protected function initFieldsOptions() {
		return array (
            'id' => array (
                'title' => '课程名称',
                'list' => array (
                    'callback' => array ('tplReplace','{callback}' => array ('getName'),C ( 'TPL_DETAIL_BTN' ),'{#}'),
                    'search' => array (
                        'type' => 'select'
                    )
                ),
                'form' => array (//编辑 使用
                        'add' => false,
                        'callback' => array ('getName'),
                        'attr' => 'disabled',
                        'validate' => array (
                                'required' => true
                        )
                )
            ),
            'name' => array (//新增 使用
                    'form' => array (
                        'title' => '课程名称',
                        'edit' => false,
                        'type' => 'text',
                        'validate' => array (
                                'required' => true
                        )
                    )
            ),
            'description'=>array(
                'title'=>'课程描述',
                'list'=>array(
					'style'=>'width:20px'
                ),
                'form'=>array(
                    'tip'=>'对课程的简单描述，少于50个字',
                    'type'=>'text',
                    'edit'=>false,
                    'validate'=>array(
                        'required'=>true,
						'maxlength'=>50,
                    )
                )
            ),
            'description1'=>array(
                'form'=>array(
                    'title'=>'课程描述',
                    'type'=>'text',
                    'add'=>false,
                    'attr'=>'disabled',
                    'callback'=>array('value','{:description}'),
                    'validate'=>array(
                        'required'=>true
                    )
                )
            ),
            'incharge_id' => array (
                'title' => '课程负责人',
                'list' => array (
                    'callback' => array ('value','{:incharge_name}'),
                    'search' => array (
                        'type' => 'select'
                    )
                ),
                'form' => array (
                    'edit' => false,
                    'type' => 'select'
                )
            ),
            'incharge_name' => array (
                'form' => array (
                    'title' => '课程负责人',
                    'attr' => 'disabled',
                    'add' => false,
                    'callback' => array ('getlecturer_names','{:incharge_id}','{#}')
                )
            ),
            'lecturer_ids' => array (
                'title' => '主讲老师',
                'list' => array (
                    'callback' => array ('getlecturer_names')
                ),
                'form' => array (
                    'edit' => false,
                    'type' => 'select',
                    'select' => array (
                        'multiple' => true
                    ),
                    'fill' => array (
                            'add' => array ('arrToStr','{:lecturer_ids}')
                    )
                )
            ),
            'lecturer_name' => array (
                'form' => array (
                    'title' => '主讲老师',
                    'attr' => 'disabled',
                    'add' => false,
                    'callback' => array (
                        'getlecturer_names',
                        '{:lecturer_ids}',
                        '{#}'
                    )
                )
            ),
            'img'=>array(
                'form'=>array(
                    'title'=>'课程封面',
                    'type'=>'file',
                    'file'=>array(
                        'ext'=>'jpg,png'
                    )
                )
            ),
            'level'=>array(
                'form'=>array(
                    'title'=>'课程级别',
                    'type'=>'select',
                )
            ),
            'intro' => array (
                'form' => array(
                    'title' => '课程介绍',
                    'type' => 'textarea',
                    'attr' => 'style="height:350px;"',
                    // 'style' => 'make-ueditor',
                    'fill'=>array(
                        'both'=>array('content')
                    ),
                    'tip'=>'请添加课程介绍'
                )
            ),
            'course_team' =>array(
                'form' => array (
                    'title' => '课程团队',
                    'type' => 'textarea',
                    'attr' => 'style="height:250px;width:150%;"',
                    'style' => 'make-ueditor',
                    'fill' => array (
                        'both' => array ('content')
                    ),
                )
            ),
            'syllabus' =>array(
                'form' => array (
                    'title' => '教学大纲',
                    'type' => 'textarea',
                    'attr' => 'style="height:350px;"',
                    // 'style' => 'make-ueditor',
                    'fill' => array (
                        'both' => array (
                            'content'
                        )
                    ),
                )
            ),
            'couser_calendar' =>array(
                'form' => array (
                    'title' => '教学日历',
                    'type' => 'textarea',
                    'attr' => 'style="height:250px;width:150%;"',
                    'style' => 'make-ueditor',
                    'fill' => array (
                        'both' => array (
                            'content'
                        )
                    ),
                )
            ),
            'video_teach' => array (
                'form' => array (
                    'title' => '教学视频',
                    'type' => 'textarea',
                    'attr' => 'style="height:250px;width:150%;"',
                    'style' => 'make-ueditor',
                    'fill' => array (
                        'both' => array (
                            'content'
                        )
                    )
                )
            ),

            'courseware' =>array(
                'form' => array (
                    'title' => '教学课件',
                    'type' => 'textarea',
                    'attr' => 'style="height:150px;width:150%;"',
                    'style' => 'make-ueditor',
                    'fill' => array (
                        'both' => array (
                            'content'
                        )
                    ),
                )
            ),
            'homework' =>array(
                'form' => array (
                    'title' => '作业习题',
                    'type' => 'textarea',
                    'attr' => 'style="height:150px;width:150%;"',
                    'style' => 'make-ueditor',
                    'fill' => array (
                        'both' => array (
                            'content'
                        )
                    ),
                )

            ),
            'audio' =>array(
                'form' => array (
                    'title' => '音频素材',
                    'type' => 'textarea',
                    'attr' => 'style="height:150px;width:150%;"',
                    'style' => 'make-ueditor',
                    'fill' => array (
                        'both' => array (
                            'content'
                        )
                    ),
                )
            ),
            'video_footage' =>array(
                'form' => array (
                    'title' => '视频素材',
                    'type' => 'textarea',
                    'attr' => 'style="height:250px;width:150%;"',
                    'style' => 'make-ueditor',
                    'fill' => array (
                        'both' => array (
                            'content'
                        )
                    ),
                )
            ),
            'resources' =>array(
                'form' => array (
                    'title' => '参考资料目录',
                    'type' => 'textarea',
                    'attr' => 'style="height:250px;width:150%;"',
                    'style' => 'make-ueditor',
                    'fill' => array (
                        'both' => array (
                            'content'
                        )
                    ),
                )
            ),
            'auxiliary_teaching' =>array(
                'form' => array (
                    'title' => '辅助教学材料',
                    'type' => 'textarea',
                    'attr' => 'style="height:250px;width:150%;"',
                    'style' => 'make-ueditor',
                    'fill' => array (
                        'both' => array (
                            'content'
                        )
                    ),
                )
            ),
			'is_publish' => array (
					'title' => '审核结果',
					'list' => array (
							'callback' => array (
									'getCheckResult' 
							)
					),
					'form' => array (
							'title' => '审核结果',
							'type' => 'select',
							'style' => 'no-bs-select' 
					) 
			) ,
            'create_time' => array (
                'list'=>array(
                    'title'=>'发布时间',
                    'callback'=>array('dataTotime')
                ),
                'form' => array (
                    'fill'=>array(
                        'add'=> array('value',time())
                    )
                )
            ),
            'status' => array (
                'title' => '状态',
                'list' => array (
                    'width' => '30',
                    'callback' => array (
                        'status'
                    )
                ),
                'form' => array (
                    'title' => '状态',
                    'type' => 'select',
                    'style' => 'no-bs-select'
                )
            )
		);
	}
    protected function getOptions_is_publish(){
        return array(
            '1' => '通过',
            '0' => '不予通过'
        );
    }
	protected function getOptions_level(){
		return array(
			'national'=>'国家级精品课程',
			'province'=>'省级精品课程',
			'college'=>'校级精品课程'
		);
	}
    protected  function callback_dataTotime($time){
        return date('Y-m-d',$time);
    }
		protected function getOptions_incharge_id() {
			$teacher_id_arr = M ( 'teacher' )->getField ( 'user_id', true );
			$teacher_id_arr = implode ( ",", $teacher_id_arr );
			$user_id = M ( 'user' )->where ( array (
					'id' => array (
							'IN',
							$teacher_id_arr 
					) 
			) )->getField ( 'id,name' );
			return $user_id;
		}
		protected function getOptions_lecturer_ids() {
			$teacher_id_arr = M ( 'teacher' )->getField ( 'user_id', true );
			$teacher_id_arr = implode ( ",", $teacher_id_arr );
			$user_id = M ( 'user' )->where ( array (
					'id' => array (
							'IN',
							$teacher_id_arr 
					) 
			) )->getField ( 'id,name' );

	
			return $user_id;
		}
		protected function callback_getName($id) {
			return $this->where ( array (
					'id' => $id 
			) )->getField ( 'name' );
		}
		protected function callback_getFormIntro($id) {
			return $this->where ( array (
					'id' => $id 
			) )->getField ( 'intro' );
		}
		protected function callback_arrToStr($arr) {
			$str = '';
			foreach ( $arr as $key => $value ) {
				$str .= $value . ',';
			}
			$str = rtrim ( $str, "," );
			
			return $str;
		}
        public function detail($pk) {
            $arr =$this->where(array(
                'id'=>$pk
            ))->find();
            return array (
                'table'=>array(
                    'intro'=>array(
                        'title' => '课程简介',
                        'icon' => 'fa-list-alt',
                        'style' => 'green',
                        'cols'=>'0,12',
                        'value' => array (
                            '' => $arr['intro'] ? ('<pre>'.$arr['intro'].'</pre>') : '无'
                        )
                    ),
                    'course_team'=>array(
                        'title' => '课程团队',
                        'icon' => 'fa-list-alt',
                        'style' => 'green',
                        'cols'=>'0,12',
                        'value' => array (
                            '' => $arr['course_team'] ? ($arr['course_team']) : '无'
                        )
                    ),
                    'video_teach'=>array(
                        'title' => '教学视频',
                        'icon' => 'fa-list-alt',
                        'style' => 'green',
                        'cols'=>'0,12',
                        'value' => array (
                            '' => $arr['video_teach'] ? ($arr['video_teach']) : '无'
                        )
                    ),
                    'syllabus'=>array(
                        'title' => '教学大纲',
                        'icon' => 'fa-list-alt',
                        'style' => 'green',
                        'cols'=>'0,12',
                        'value' => array (
                            '' => $arr['syllabus'] ? ('<pre>'.$arr['syllabus'].'</pre>') : '无'
                        )
                    ),
                    'course_calendar'=>array(
                        'title' => '教学日历',
                        'icon' => 'fa-list-alt',
                        'style' => 'green',
                        'cols'=>'0,12',
                        'value' => array (
                            '' => $arr['couser_calendar'] ? $arr['couser_calendar']: '无'
                        )
                    ),
                    'courseware'=>array(
                        'title' => '教学课件',
                        'icon' => 'fa-list-alt',
                        'style' => 'green',
                        'cols'=>'0,12',
                        'value' => array (
                            '' =>$arr['courseware'] ? $arr['courseware']: '无'
                        )
                    ),
                    'homework'=>array(
                        'title' => '作业习题',
                        'icon' => 'fa-list-alt',
                        'style' => 'green',
                        'cols'=>'0,12',
                        'value' => array (
                            '' => $arr['homework'] ? $arr['homework']: '无'
                        )
                    ),
                    'audio'=>array(
                        'title' => '音频素材',
                        'icon' => 'fa-list-alt',
                        'style' => 'green',
                        'cols'=>'0,12',
                        'value' =>array (
                            '' => $arr['audio'] ? $arr['audio']: '无'
                        )
                    ),
                    'video_footage'=>array(
                        'title' => '视频素材',
                        'icon' => 'fa-list-alt',
                        'style' => 'green',
                        'cols'=>'0,12',
                        'value' => array (
                            '' => $arr['video_footage'] ? $arr['video_footage'] : '无'
                        )
                    ),
                    'auxiliary_teaching'=>array(
                        'title' => '辅助教学材料',
                        'icon' => 'fa-list-alt',
                        'style' => 'green',
                        'cols'=>'0,12',
                        'value' => array (
                            '' => $arr['auxiliary_teaching'] ? $arr['auxiliary_teaching'] : '无'
                        )
                    ),
                    'resources'=>array(
                        'title' => '参考资料目录',
                        'icon' => 'fa-list-alt',
                        'style' => 'green',
                        'cols'=>'0,12',
                        'value' => array (
                            '' => $arr['resources'] ? $arr['video_footage'] : '无'
                        )
                    )
                )
            );
        }
		protected function callback_getlecturer_names($arr) {
			$user_name_arr = M ( 'user' )->where ( array (
					'id' => array ('IN',$arr)
			) )->getField ( 'name', true );
			$user_name_str = implode ( ',', $user_name_arr );
			return $user_name_str;
		}
		protected function callback_getCheckResult($is_publish_id) {
			if ($is_publish_id === '1') {
				
				$CheckResult = "<span style='color:green;'>已审核通过</span>";
			} else if ($is_publish_id === '0') {
				$CheckResult = "<span style='color:red;'>已审核未通过</span>";
			} else {
				$CheckResult = "<span style='color:#5ABBB7;'>已提交待审核</span>";
			}
			return $CheckResult;
		}
		protected function getOptions_id(){
			return $this
                    ->where (array('status' => 1))
                    ->getField ( 'id,name' );
		}

        public function _after_update($data){
            $this->setAlert($data['id']);
        }

        public function setAlert($id){
            $incharge_id = M('good_course')->where(array('id'=>$id))->getField('incharge_id');
           // $user_id = M('teacher')->where(array('user_id'=>$incharge_id))->getField('user_id');

            $toUsers=$incharge_id;
           // $toUsers=implode(',',$toUsers);
            $category='课程审核';
            $message=session('userName').'于'.date('Y-m-d H:i:s').'审核了您发布的精品课程';
            $icon='label-success,fa-user';
            $url='GoodCourse/CourseView/all';
            $context=$id;
            $ha=new HyAlertModel();
            $ha->sysAlert($category,$message,$icon,$url,$toUsers,$context);
            //dump($activity_id);
            return $ha;
        }
}
