<?php
namespace GoodCourse\Model;
use Common\Model\HyAllModel;
/**
 * 精品课程管理模型-超级管理员角色
 *
 * @author
 *
 */
class GoodCoursePModel extends GoodCourseModel {

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
            //文本编辑器配置项，可增删功能
            'initJS' => array(
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
            'buttons' => array (
                'add'=>array(
                    'title'=>'新增精品课程',
                    'icon'=>'fa-plus',
                ) 
            ),
            'formSize'=>'full'
        );
    }
	

 }