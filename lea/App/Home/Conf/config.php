<?php
$config = array(
	//'配置项'=>'配置值'
	'DEFAULT_THEME'        =>buptTPL,  //默认模板
	//'DEFAULT_THEME'        =>'default',  //默认模板
	'TMPL_PARSE_STRING'  => array(
		'__THEME__'     => __ROOT__.'/Template/Home', // 增加新的JS类库路径替换规则
	),
);
$bupt_tmpl_config = CONF_PATH.'bupt_TMPL_PARSE_STRING.php';
$bupt_tmpl_config = file_exists($bupt_tmpl_config) ? include "$bupt_tmpl_config" : array();
$config['TMPL_PARSE_STRING'] = array_merge($config['TMPL_PARSE_STRING'], $bupt_tmpl_config);
return array_merge($config, $bupt_tmpl_config);