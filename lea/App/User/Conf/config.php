<?php
$config = array(
	'SHOW_PAGE_TRACE'=>0,
	'TMPL_DETECT_THEME' => 1, 
	'DEFAULT_THEME'        =>buptTPL,  //默认模板
	
	'TMPL_PARSE_STRING'=>array(
		'__CSS__'=> __ROOT__.'/Template/User/'.buptTPL.'/Public/style/',
		'__JS__'=> __ROOT__.'/Template/User/'.buptTPL.'/Public/js/',
		'__IMG__'=> __ROOT__.'/Template/User/'.buptTPL.'/Public/img/',
		'__LIB__'=> __ROOT__.'/Public/lib/',
	
	 ),
);

$bupt_tmpl_config = CONF_PATH.'bupt_TMPL_PARSE_STRING.php';
$bupt_tmpl_config = file_exists($bupt_tmpl_config) ? include "$bupt_tmpl_config" : array();
$config['TMPL_PARSE_STRING'] = array_merge($config['TMPL_PARSE_STRING'], $bupt_tmpl_config);


return array_merge($config, $bupt_tmpl_config);