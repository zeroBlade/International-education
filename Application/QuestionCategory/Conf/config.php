<?php
return array(
		'LOAD_ASSETS' =>array(
				'GLOBAL'	=>	array(
						'CSS'	=>	array(
									
						),
						'JS'	=>	array(
									
						)
				),
				'PLUGINS'	=>	array(
						'CSS'	=>	array(
								'QuestionsAnswer/all'=>'umeditor/themes/default/css/umeditor.css',
						),
						'JS'	=>	array(
								'QuestionsAnswer/all'	=>	array(
										'umeditor/umeditor.config.js',
										'umeditor/umeditor.min.js'
								),
					
						)
				),
		
				'PAGES'		=>	array(
						'CSS'	=>	array(
									
						),
						'JS'	=>	array(
								'Index/*'		=>	'index.js',
								'HyAlert/all'	=>	'hy-alert.js',
								'HyAlertA2/all'	=>	'hy-alert.js',
								'Questions/all'=>  'question-xhj.js',
								'QuestionsGood/all'=>'question-xhj.js',
								'QuestionsAnswer/all'=>'question-xhj.js',
								'QuestionCategory/all'=>'stopXhj.js'
						)
				)
		),
		// 管理员消息ICON（HyAlertA2Model）
				'ADMIN_ALERT_ICON'		=>	'label-info,fa-bell',
		
);