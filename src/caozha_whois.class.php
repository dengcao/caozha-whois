<?php
/*
☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆
☆                                                                         ☆
☆  源 码：域名Whois查询类（PHP）                                             ☆
☆  日 期：2020-05                                                          ☆
☆  开 发：草札(www.caozha.com)                                              ☆
☆  鸣 谢：穷店(www.qiongdian.com) 品络(www.pinluo.com)                      ☆
☆  Git仓库: https://gitee.com/caozha/caozha-whois                          ☆
☆  Copyright ©2020 www.caozha.com All Rights Reserved.                    ☆
☆                                                                         ☆
☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆☆
*/
	
class caozha_whois {

	var $whois_servers = array(
		//Whois服务器，参考：http://www.iana.org/domains/root/db
		"ac" => "whois.nic.ac",
		"ae" => "whois.aeda.net.ae",
		"aero" => "whois.aero",
		"af" => "whois.nic.af",
		"ag" => "whois.nic.ag",
		"al" => "whois.ripe.net",
		"am" => "whois.amnic.net",
		"as" => "whois.nic.as",
		"asia" => "whois.nic.asia",
		"at" => "whois.nic.at",
		"au" => "whois.aunic.net",
		"ax" => "whois.ax",
		"az" => "whois.ripe.net",
		"ba" => "whois.ripe.net",
		"be" => "whois.dns.be",
		"bg" => "whois.register.bg",
		"bi" => "whois.nic.bi",
		"biz" => "whois.neulevel.biz",
		"bj" => "www.nic.bj",
		"br" => "whois.nic.br",
		"br.com" => "whois.centralnic.com",
		"bt" => "whois.netnames.net",
		"by" => "whois.cctld.by",
		"bz" => "whois2.afilias-grs.net",
		"ca" => "whois.cira.ca",
		"cat" => "whois.cat",
		"cc" => "whois.nic.cc",
		"cd" => "whois.nic.cd",
		"ch" => "whois.nic.ch",
		"ck" => "whois.nic.ck",
		"cl" => "whois.nic.cl",
		"cn" => "whois.cnnic.net.cn",
		"cn.com" => "whois.centralnic.com",
		"co" => "whois.nic.co",
		"co.nl" => "whois.co.nl",
		"coop" => "whois.nic.coop",
		"cx" => "whois.nic.cx",
		"cy" => "whois.ripe.net",
		"cz" => "whois.nic.cz",
		"de" => "whois.denic.de",
		"dk" => "whois.dk-hostmaster.dk",
		"dm" => "whois.nic.cx",
		"dz" => "whois.nic.dz",
		"edu" => "whois.educause.net",
		"ee" => "whois.tld.ee",
		"eg" => "whois.ripe.net",
		"es" => "whois.nic.es",
		"eu" => "whois.eu",
		"eu.com" => "whois.centralnic.com",
		"fi" => "whois.ficora.fi",
		"fo" => "whois.nic.fo",
		"fr" => "whois.nic.fr",
		"gb" => "whois.ripe.net",
		"gb.com" => "whois.networksolutions.com",
		"gb.net" => "whois.centralnic.com",
		"qc.com" => "whois.centralnic.com",
		"ge" => "whois.ripe.net",
		"gl" => "whois.nic.gl",
		"gm" => "whois.ripe.net",
		"gov" => "whois.nic.gov",
		"gr" => "whois.ripe.net",
		"gs" => "whois.nic.gs",
		"hk" => "whois.hknic.net.hk",
		"hm" => "whois.registry.hm",
		"hn" => "whois.nic.hn",
		"hr" => "whois.dns.hr",
		"hu" => "whois.nic.hu",
		"hu.com" => "whois.centralnic.com",
		"id" => "whois.pandi.or.id",
		"ie" => "whois.domainregistry.ie",
		"il" => "whois.isoc.org.il",
		"in" => "whois.inregistry.net",
		"info" => "whois.afilias.info",
		"int" => "whois.isi.edu",
		"io" => "whois.nic.io",
		"iq" => "vrx.net",
		"ir" => "whois.nic.ir",
		"is" => "whois.isnic.is",
		"it" => "whois.nic.it",
		"je" => "whois.je",
		"jobs" => "jobswhois.verisign-grs.com",
		"jp" => "whois.jprs.jp",
		"ke" => "whois.kenic.or.ke",
		"kg" => "whois.domain.kg",
		"kr" => "whois.nic.or.kr",
		"la" => "whois.nic.la",
		"li" => "whois.nic.li",
		"lt" => "whois.domreg.lt",
		"lu" => "whois.restena.lu",
		"lv" => "whois.nic.lv",
		"ly" => "whois.nic.ly",
		"ma" => "whois.iam.net.ma",
		"mc" => "whois.ripe.net",
		"md" => "whois.nic.md",
		"me" => "whois.nic.me",
		"mil" => "whois.nic.mil",
		"mk" => "whois.ripe.net",
		"mobi" => "whois.dotmobiregistry.net",
		"ms" => "whois.nic.ms",
		"mt" => "whois.ripe.net",
		"mu" => "whois.nic.mu",
		"mx" => "whois.nic.mx",
		"my" => "whois.mynic.net.my",
		"name" => "whois.nic.name",
		"net" => "whois.verisign-grs.com",
		"nf" => "whois.nic.nf",
		"ng" => "whois.nic.net.ng",
		"nl" => "whois.domain-registry.nl",
		"no" => "whois.norid.no",
		"no.com" => "whois.centralnic.com",
		"nu" => "whois.nic.nu",
		"nz" => "whois.srs.net.nz",
		"co.nz" => "whois.srs.net.nz",
		"org" => "whois.pir.org",
		"pl" => "whois.dns.pl",
		"pr" => "whois.nic.pr",
		"pro" => "whois.registrypro.pro",
		"pt" => "whois.dns.pt",
		"pw" => "whois.nic.pw",
		"ro" => "whois.rotld.ro",
		"ru" => "whois.tcinet.ru",
		"sa" => "saudinic.net.sa",
		"sa.com" => "whois.centralnic.com",
		"sb" => "whois.nic.net.sb",
		"sc" => "whois2.afilias-grs.net",
		"se" => "whois.nic-se.se",
		"se.com" => "whois.centralnic.com",
		"se.net" => "whois.centralnic.com",
		"sg" => "whois.nic.net.sg",
		"sh" => "whois.nic.sh",
		"si" => "whois.arnes.si",
		"sk" => "whois.sk-nic.sk",
		"sm" => "whois.nic.sm",
		"st" => "whois.nic.st",
		"so" => "whois.nic.so",
		"su" => "whois.tcinet.ru",
		"tc" => "whois.adamsnames.tc",
		"tel" => "whois.nic.tel",
		"tf" => "whois.nic.tf",
		"th" => "whois.thnic.net",
		"tj" => "whois.nic.tj",
		"tk" => "whois.nic.tk",
		"tm" => "whois.nic.tm",
		"tn" => "whois.ati.tn",
		"to" => "whois.tonic.to",
		"tp" => "whois.domains.tl",
		"tr" => "whois.nic.tr",
		"travel" => "whois.nic.travel",
		"tw" => "whois.twnic.net.tw",
		"tz" => "whois.tznic.or.tz",
		"ua" => "whois.ua",
		"uk" => "whois.nic.uk",
		"uk.com" => "whois.centralnic.com",
		"uk.net" => "whois.centralnic.com",
		"ac.uk" => "whois.ja.net",
		"gov.uk" => "whois.ja.net",
		"us" => "whois.nic.us",
		"us.com" => "whois.centralnic.com",
		"uy" => "nic.uy",
		"uy.com" => "whois.centralnic.com",
		"uz" => "whois.cctld.uz",
		"va" => "whois.ripe.net",
		"vc" => "whois2.afilias-grs.net",
		"ve" => "whois.nic.ve",
		"vg" => "whois.nic.vg",
		"ws" => "whois.website.ws",
		"xxx" => "whois.nic.xxx",
		"yu" => "whois.ripe.net",
		"za.com" => "whois.centralnic.com",
		"com" => "whois.internic.net",
		"aero" => "whois.aero",
		"arpa" => "whois.iana.org",
		"asia" => "whois.nic.asia",
		"at" => "whois.nic.at",
		"be" => "whois.dns.be",
		"biz" => "whois.biz",
		"br" => "whois.registro.br",
		"ca" => "whois.cira.ca",
		"cc" => "whois.nic.cc",
		"cn" => "whois.cnnic.net.cn",
		"com" => "whois.verisign-grs.com",
		"gov" => "whois.nic.gov",
		"in" => "whois.inregistry.net",
		"info" => "whois.afilias.info",
		"int" => "whois.iana.org",
		"is" => "whois.isnic.is",
		"it" => "whois.nic.it",
		"jobs" => "jobswhois.verisign-grs.com",
		"me" => "whois.meregistry.net",
		"mil" => "whois.nic.mil",
		"mobi" => "whois.dotmobiregistry.net",
		"museum" => "whois.museum",
		"name" => "whois.nic.name",
		"net" => "whois.verisign-grs.net",
		"org" => "whois.pir.org",
		"pro" => "whois.registrypro.pro",
		"tc" => "whois.adamsnames.tc",
		"tel" => "whois.nic.tel",
		"travel" => "whois.nic.travel",
		"co.uk" => "whois.nic.uk",
		"org.uk" => "whois.nic.uk",
		"us" => "whois.nic.us",
		"wang" => "whois.nic.wang",
		"top" => "whois.nic.top",
		"ren" => "whois.nic.ren",
		"xn--55qx5d" => "whois.ngtld.cn",
		"公司" => "whois.ngtld.cn",
		"中国" => "whois.cnnic.net.cn",
		"xn--fiqs8s" => "whois.cnnic.net.cn",
		"网络" => "whois.ngtld.cn",
		"xn--io0a7i" => "whois.ngtld.cn",
		"政务" => "whois.ngtld.cn",
		"xn--zfr164b" => "whois.ngtld.cn",
		"公益" => "whois.ngtld.cn",
		"xn--55qw42g" => "whois.ngtld.cn",
		"集团" => "whois.nic.wang",
		"xn--3bst00m" => "whois.nic.wang",
		"新闻" => "whois.gtld.knet.cn",
		"网店" => "whois.gtld.knet.cn",
		"时尚" => "whois.gtld.knet.cn",
		"商标" => "whois.gtld.knet.cn",
		"我爱你" => "whois.gtld.knet.cn",
		"网址" => "whois.gtld.knet.cn",
		"中信" => "whois.gtld.knet.cn",
		"八卦" => "whois.gtld.knet.cn",
		"商城" => "whois.gtld.knet.cn",
		"餐厅" => "whois.gtld.knet.cn",
		"娱乐" => "whois.gtld.knet.cn",
		"慈善" => "whois.gtld.knet.cn",
		"手机" => "whois.afilias-srs.net",
		"xn--kput3i" => "whois.afilias-srs.net",
		"ws" => "whois.website.ws",
		"xxx" => "whois.nic.xxx",
		"ac" => "whois.nic.ac",
		"af" => "whois.nic.af",
		"as" => "whois.nic.as",
		"ag" => "whois.nic.ag",
		"am" => "whois.amnic.net",
		"at" => "whois.nic.at",
		"cm" => "whois.netcom.cm",
		"com.de" => "whois.denic.de",
		"ec" => "whois.nic.ec",
		"fm" => "whois.nic.fm",
		"gg" => "whois.gg",
		"gy" => "whois.registry.gy",
		"mg" => "whois.nic.mg",
		"pe" => "kero.yachay.pe",
		"ph" => "dot.ph",
		"sg" => "whois.sgnic.sg",
		"sx" => "whois.sx",
		"tl" => "whois.nic.tl",
		"tv" => "tvwhois.verisign-grs.com",
		"gb" => "whois.1api.net",
		"site" => "whois.centralnic.com",
		"website" => "whois.nic.website",
		"web" => "whois.centralnic.com",
		"home" => "whois.centralnic.com",
		"space" => "whois.nic.space",
		"online" => "whois.centralnic.com",
		"press" => "whois.nic.press",
		"tech" => "whois.nic.tech",
		"store" => "whois.centralnic.com",
		"music" => "whois.centralnic.com",
		"shop" => "whois.centralnic.com",
		"mk" => "whois.marnet.mk",
		"gw" => "whois.nic.gw",
		"mp" => "whois.nic.mp",
		"ml" => "whois.dot.ml",
		"tk" => "whois.dot.tk",
		"cf" => "whois.dot.cf",
		"ga" => "whois.my.ga",
		"gq" => "whois.dominio.gq",
		"sg" => "whois.sgnic.sg",
		"mo" => "whois.monic.mo",
		"news" => "whois.rightside.co",
		"bi" => "whois1.nic.bi",
		"tn" => "whois.ati.tn" );


	function get_domain_whois( $domain_name ) {
		$domain_name = str_ireplace( "。", ".", $domain_name ); //兼容中文用户把.输成。的习惯
		$get_pos = stripos( $domain_name, "." );
		if ( !$get_pos ) {
			return false;
		} //当查询域名不是域名时，直接返回false
		$tld_current = substr( $domain_name, $get_pos + 1 ); //获取当前查询域名的后缀
		$tld_whoisserver = $this->whois_servers[ $tld_current ];//获取当前查询域名的whois服务器
		
		//echo $whoisserver;exit;
		if ( !$tld_whoisserver ) {
			if ( $tld_current ) {
				$tld_current_arr = explode( ".", $tld_current );
				if ( $tld_current_arr[ 1 ] ) {
					$tld_whoisserver = $this->whois_servers[ $tld_current_arr[ 1 ] ];//兼容如.net.cn此类二级域名
				} else {
					$tld_whoisserver = "whois.nic." . $tld_current;
				}
			}else{
				return "错误：找不到域名$domain的whois服务器！";
			}

		}
		
		$result = $this->query_whois( $tld_whoisserver, $domain_name );
		if ( !$result ) {
			return "错误：没找到域名$domain的whois记录！";
		}

		preg_match( "/Whois Server: (.*)/", $result, $matches );
		$secondary = $matches[ 1 ];
		if ( $secondary ) {
			$result = $this->query_whois( $secondary, $domain_name );//针对特殊情况，二次查询
		}
		return $result;
	}

	
function query_whois($tld_whoisserver, $domain_name) {
	$port = 43;
	$timeout = 120;	
	$fp = @fsockopen($tld_whoisserver, $port, $errno, $errstr, $timeout);
	if($errstr){return "Socket错误：" . $errno . " - " . $errstr;}
	fputs($fp, $domain_name . "\r\n");
	$out = "";	
	while(!feof($fp)){
		$out .= fgets($fp);
	}
	fclose($fp);
	if($out=="No matching record."){return "域名：".$domain_name." 未注册。";}
	return $out;
}


}
