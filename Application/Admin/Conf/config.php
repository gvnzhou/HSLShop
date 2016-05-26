<?php
return array(
	//'配置项'=>'配置值'
  'DB_TYPE'   => 'mysql', // 数据库类型
  'DB_HOST'   => '121.42.146.69', // 服务器地址
  'DB_NAME'   => 'hslshop', // 数据库名
  'DB_USER'   => 'root', // 用户名
  'DB_PWD'    => 'ccda02c11d', // 密码
  'DB_PORT'   => 3306, // 端口
  'DB_PREFIX' => 'hsl_', // 数据库表前缀 
  'DB_CHARSET'=> 'utf8', // 字符集
  'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增

  'TMPL_PARSE_STRING'  =>array(
      '__JS__'     => '/HSLshop/Public/admin/js', // 增加新的JS类库路径替换规则
      '__CSS__' => '/HSLshop/Public/admin/css', // 增加新的CSS路径替换规则
      '__EDITOR__' => '/HSLshop/Public/admin/kindeditor', // 增加新的CSS路径替换规则
  )
);