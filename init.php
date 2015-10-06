<?php
// 生成随机TOKEN
//$token = gen_token();
$token = md5(uniqid());

// 替换arar2.conf中的TOKEN
$file = '/cldata/aria2.conf';
file_put_contents( $file , str_replace('{{token}}' , $token , file_get_contents($file)));

// 替换yaaw中的TOEKN
$file = '/var/www/html/js/yaaw.js';
file_put_contents( $file , str_replace('{{token}}' , $token , file_get_contents($file)));

function gen_token()
{
	$token = md5(uniqid()).md5(uniqid());
	$format = '00000000-0000-0000-0000-000000000000';
	$substr = explode('-',$format);
	foreach( $substr as $str )
	{
		$ret[]= substr( $token , 0 , strlen($str) );
		$token = substr( $token , strlen($str) , strlen($token) - strlen($str) );
	}

	return join('-',$ret);
}

