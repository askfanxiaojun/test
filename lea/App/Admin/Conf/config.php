<?php
$config = array(
	//'配置项'=>'配置值'
	'DEFAULT_THEME'        =>'default',  //默认模板
    'TMPL_PARSE_STRING'  => array(
		'__THEME_PUBLIC__'=>__ROOT__.'/Template/Admin/default/Style',
		
	),

	'AUTH_CONFIG'=>array(
        'AUTH_ON' => true, //认证开关
        'AUTH_TYPE' => 1, // 认证方式，1为时时认证；2为登录认证。
        'AUTH_GROUP' => 'bupt_admin_auth_group', //用户组数据表名
        'AUTH_GROUP_ACCESS' => 'bupt_admin_auth_group_access', //用户组明细表
        'AUTH_RULE' => 'bupt_admin_auth_rule', //权限规则表
        'AUTH_USER' => 'bupt_admin_user',//用户信息表
        'AUTH_ADMINUID' => array('1'),    //定义UID为1为系统管理员,无需进行权限认证；//'administrator'=>array('1','3'),    //定义UID为1和3的用户为超级管理员；
    ),

);

$bupt_tmpl_config = CONF_PATH.'bupt_TMPL_PARSE_STRING.php';

$bupt_tmpl_config = file_exists($bupt_tmpl_config) ? include "$bupt_tmpl_config" : array();
$config['TMPL_PARSE_STRING'] = array_merge($config['TMPL_PARSE_STRING'], $bupt_tmpl_config);

return array_merge($config, $bupt_tmpl_config);