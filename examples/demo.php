<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>查询域名whois演示</title>
<?php
include_once("../src/caozha_whois.class.php");
$caozha=new caozha_whois_query();
?>
</head>
<body>
	<b>域名ijr.cn的whois信息如下：</b><br>
<br>
<pre style="word-break:break-all;white-space:pre-wrap;">
<?php
	$domain_name="ijr.cn";	
	echo $caozha->get_domain_whois( $domain_name );
?>
</pre>
<br>
<br>
<br>
<br>
	<b>域名caozha.com的whois信息如下：</b><br>
<br>
<pre style="word-break:break-all;white-space:pre-wrap;">
<?php
	$domain_name2="caozha.com";	
	echo $caozha->get_domain_whois( $domain_name2 );
?>
</pre>
</body>
</html>