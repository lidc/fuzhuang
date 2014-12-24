<?php
session_start();
//Connect To Database
$hostname='localhost';

//$username='lsd';
//$password='up8818';
//$dbname='loushangdian_et';
//$SitePath="/et/";
$username="root";
$password="";
$dbname="jjb";


mysql_connect($hostname,$username,$password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);
mysql_query("set names utf8");
//Functions
function get_num($tb,$tj)
{
	$execc1="select count(*) from ".$tb." where ".$tj;
	$resultc1=mysql_query($execc1);
	$rsc1=mysql_fetch_array($resultc1);
	$num1=$rsc1[0];
	return $num1;
}
function get_pageinfo($table,$where)
{
	$execc1="select * from ".$table." where ".$where;
	$resultc1=mysql_query($execc1);
	$rsc1=mysql_fetch_object($resultc1);
	$rsa = array($rsc1->id,$rsc1->mytitle,$rsc1->myinfo,$rsc1->myphoto,$rsc1->mytime,$rsc1->mtitle,$rsc1->mkey,$rsc1->mdescon,$rsc1->myxh,$rsc1->id1,$rsc1->mb,$rsc1->nido,$rsc1->infant_community);
	return $rsa;	
}

function get_pagetitle($id)
{
	$execc1="select * from page where id=".$id;
	$resultc1=mysql_query($execc1);
	$rsc1=mysql_fetch_object($resultc1);
	return $rsc1->mytitle;	
}

function get_newscat($tb,$tj)
{
	$execc1="select * from ".$tb." where ".$tj;
	$resultc1=mysql_query($execc1);
	$rsc1=mysql_fetch_object($resultc1);
	$rsa=array($rsc1->mytitle,$rsc1->mtitle,$rsc1->mdescon,$rsc1->mkey);
	return $rsa;	
}

function get_news($tb,$tj)
{
	$execc1="select * from ".$tb." where ".$tj;
	$resultc1=mysql_query($execc1);
	$rsc1=mysql_fetch_object($resultc1);
	$rsa=array($rsc1->mytitle,$rsc1->myinfo,$rsc1->mytime,$rsc1->kinds,$rsc1->mtitle,$rsc1->mdescon,$rsc1->mkey);
	return $rsa;	
}

function get_procat($tb,$tj)
{
	$execc1="select * from ".$tb." where ".$tj;
	$resultc1=mysql_query($execc1);
	$rsc1=mysql_fetch_object($resultc1);
	$rsa=array($rsc1->mytitle,$rsc1->id1,$rsc1->id2,$rsc1->id3,$rsc1->mtitle,$rsc1->mdescon,$rsc1->mkey,$rsc1->photo,$rsc1->myh1);
	return $rsa;
}

function get_procattitle($tb,$tj)
{
	$execc1="select * from ".$tb." where ".$tj;
	$resultc1=mysql_query($execc1);
	if($resultc1)
	{
	$rsc1=mysql_fetch_object($resultc1);
	$rsa=$rsc1->mytitle;
	return $rsa;
	}
	else
	{
	 return "";
	}
}

function get_country($tb,$tj)
{
	$execc1="select * from ".$tb." where ".$tj;
	$resultc1=mysql_query($execc1);
	if($resultc1)
	{
	$rsc1=mysql_fetch_object($resultc1);
	$rsa=$rsc1->country;
	return $rsa;
	}
	else
	{
	 return "";
	}
}

function get_color($id)
{
	$execc1="select * from news where id=".$id;
	$resultc1=mysql_query($execc1);
	$rsc1=@mysql_fetch_object($resultc1);
	$rsa=$rsc1->mytitle;
	return $rsa;
}

function showlinks($sid,$link)
{  
   $exec="select * from page where id1=$sid order by myxh";
   $result=@mysql_query($exec);
   while($rs=@mysql_fetch_object($result))
   {
	   echo "<a href=\"".$link."?pageid=".$rs->id."\" title=\"".$rs->mytitle."\">".$rs->mytitle."</a>";
   }
}

function dropdown($sid,$url)
{
 $sql="select * from ps where id1=$sid order by myxh";
 @$result=mysql_query($sql);
 if($result)
   {
     while($rf=mysql_fetch_object($result))
     {
	   echo '<li><a href="';
	   echo $url."?id1=".$sid."&id2=".$rf->id;
	   echo '" >';
	   echo $rf->mytitle;
	   echo '</a></li>';
     }
   }
}

function get_colorimg($id)
{
	$execc1="select * from news where id=".$id;
	$resultc1=mysql_query($execc1);
	$rsc1=@mysql_fetch_object($resultc1);
	$rsa="uploads/".$rsc1->myphoto;
	return $rsa;
}
function get_userkind($id)
{
	$execc1="select * from user where username='$id'";
	$resultc1=mysql_query($execc1);
	$rsc1=@mysql_fetch_object($resultc1);
	$rsa=$rsc1->kinds;
	return $rsa;
}

function replaceHtmlAndJs($document)
{
     $document = trim($document);
     if (strlen($document) <= 0) {
      return $document;
     }
     $search = array ("'<script[^>]*?>.*?</script>'si",  // 去掉 javascript
                   "'<[\/\!]*?[^<>]*?>'si",          // 去掉 HTML 标记
                "'([\r\n])[\s]+'",                // 去掉空白字符
             "'&(quot|#34);'i",                // 替换 HTML 实体
          "'&(amp|#38);'i",
          "'&(lt|#60);'i",
          "'&(gt|#62);'i",
          "'&(nbsp|#160);'i"
          );                    // 作为 PHP 代码运行
     $replace = array ("",
           "",
           "\1",
           "\"",
           "&",
           "<",
           ">",
           " "
          );
     return @preg_replace ($search, $replace, $document);
}

function _content($date){
	$date=explode("|",$date);
	return $date[1];
}
function _link($url){
	$ch = curl_init();
	$timeout = 5;
	curl_setopt ($ch, CURLOPT_URL, "$url");
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)");
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$contents = curl_exec($ch);
	curl_close($ch);
	if($contents=="Forbidden" || empty($contents)){
		$contents = @file_get_contents("$url");
	}
	return $contents;
}

function getlv($from="CNY",$to="USD")
{
	$url="http://www.google.com.hk/finance?q=CURRENCY%3A".$from.$to."&hl=zh-CN";
    $contents=_link($url);
    $contents=replaceHtmlAndJs($contents);
    $num=strripos($contents,"=");
    $contents=substr($contents,$num+1,-1);
    $contents=substr($contents,0,7);
    return $contents;
}

function getlvf($from="GBP",$to="USD")
{
	$sql="select * from rate where fromb='".$from."' and tob='".$to."'";
	$result=mysql_query($sql);
	$rsf=mysql_fetch_object($result);
	if($rsf)
	{
      return $rsf->rate;
	}
	else
	{
	  return 0;
	}
}

function checkrate($from,$to)
{
	$sql="select * from rate where fromb='".$from."' and tob='".$to."'";
	$result=mysql_query($sql);
	$rsf=mysql_fetch_object($result);
	if($rsf)
	{
      return true;
	}
	else
	{
	  return false;
	}
}

function checkcountry($title)
{
	$sql="select * from country where country='".$title."'";
	$result=mysql_query($sql);
	$rsf=mysql_fetch_object($result);
	if($rsf)
	{
      return true;
	}
	else
	{
	  return false;
	}
}

function checkcountry1($title,$id)
{
	$sql="select * from country where country='".$title."' and id<>".$id."";
	$result=mysql_query($sql);
	$rsf=mysql_fetch_object($result);
	if($rsf)
	{
      return true;
	}
	else
	{
	  return false;
	}
}


function checkship($from,$to)
{
	$sql="select * from ship where countryid=".$from." and weight=".$to."";
	@$result=mysql_query($sql);
	if($result)
	{
	  $rsf=mysql_fetch_object($result);
	  if($rsf)
	  {
        return $rsf->id;
	  }
	  else
	  {
	    return 0;
	  }
	}
	else
	{
	    return 0;	 
	}
}

function checkrate1($from,$to,$id)
{
	$sql="select * from rate where fromb='".$from."' and tob='".$to."'";
	$result=mysql_query($sql);
	$rsf=mysql_fetch_object($result);
	if($rsf)
	{  
	  if($rsf->id==$id)
	  {
         return false;
	  }
	  else
	  {
		 return true; 
	  }
	}
	else
	{
	  return false;
	}
}

/*
功能：用来过滤字符串和字符串数组，防止被挂马和sql注入
参数$data，待过滤的字符串或字符串数组，
$force为true，忽略get_magic_quotes_gpc
*/
function in($data, $force=false, $htmlspecialchar=true)
{
	if(is_string($data))
	{
		if($htmlspecialchar == true){
			$data=trim(htmlspecialchars($data));//防止被挂马，跨站攻击
		}
		if(($force==true)||(!get_magic_quotes_gpc()))
		{
			$data = addslashes($data);//防止sql注入
		}
		return  $data;
	}
	else if(is_array($data))//如果是数组采用递归过滤
	{
		foreach($data as $key=>$value)
		{
			$data[$key]=in($value, $force);
		}
		return $data;
	}
	else
	{
		return $data;
	}
}

//用来还原字符串和字符串数组，把已经转义的字符还原回来
function out($data)
{
	if(is_string($data))
	{
		return $data = stripslashes($data);
	}
	else if(is_array($data))//如果是数组采用递归过滤
	{
		foreach($data as $key=>$value)
		{
			$data[$key]=out($value);
		}
		return $data;
	}
	else
	{
		return $data;
	}
}

//文本输入
function text_in($str)
{
	$str=strip_tags($str,'<br>');
	$str = str_replace(" ", "&nbsp;", $str);
	$str = str_replace("\n", "<br>", $str);
	if(!get_magic_quotes_gpc())
	{
		$str = addslashes($str);
	}
	return $str;
}

//文本输出
function text_out($str)
{
	$str = str_replace("&nbsp;", " ", $str);
	$str = str_replace("<br>", "\n", $str);
	$str = stripslashes($str);
	return $str;
}

//html代码输入
function html_in($str)
{
	$search = array ("'<script[^>]*?>.*?</script>'si",  // 去掉 javascript
	"'<iframe[^>]*?>.*?</iframe>'si", // 去掉iframe
	);
	$replace = array ("",
	"",
	);
	$str=@preg_replace ($search, $replace, $str);
	$str=htmlspecialchars($str);
	if(!get_magic_quotes_gpc())
	{
		$str = addslashes($str);
	}
	return $str;
}

//html代码输出
function html_out($str)
{
	if(function_exists('htmlspecialchars_decode'))
	$str=htmlspecialchars_decode($str);
	else
	$str=html_entity_decode($str);

	$str = stripslashes($str);
	return $str;
}

function html2text($str,$encode = 'utf-8'){    $str = preg_replace("/<style .*?<\/style>/is", "", $str);  $str = preg_replace("/<script .*?<\/script>/is", "", $str);  $str = preg_replace("/<br \s*\/?\/>/i", "\n", $str);  $str = preg_replace("/<\/?p>/i", "\n\n", $str);  $str = preg_replace("/<\/?td>/i", "\n", $str);  $str = preg_replace("/<\/?div>/i", "\n", $str);  $str = preg_replace("/<\/?blockquote>/i", "\n", $str);  $str = preg_replace("/<\/?li>/i", "\n", $str);  $str = preg_replace("/\&nbsp\;/i", " ", $str);  $str = preg_replace("/\&nbsp/i", " ", $str);    $str = preg_replace("/\&amp\;/i", "&", $str);  $str = preg_replace("/\&amp/i", "&", $str);    $str = preg_replace("/\&lt\;/i", "<", $str);  $str = preg_replace("/\&lt/i", "<", $str);    $str = preg_replace("/\&ldquo\;/i", '"', $str);  $str = preg_replace("/\&ldquo/i", '"', $str);      $str = preg_replace("/\&lsquo\;/i", "'", $str);      $str = preg_replace("/\&lsquo/i", "'", $str);      $str = preg_replace("/\&rsquo\;/i", "'", $str);      $str = preg_replace("/\&rsquo/i", "'", $str);  $str = preg_replace("/\&gt\;/i", ">", $str);   $str = preg_replace("/\&gt/i", ">", $str);   $str = preg_replace("/\&rdquo\;/i", '"', $str);   $str = preg_replace("/\&rdquo/i", '"', $str);   $str = strip_tags($str);  $str = html_entity_decode($str, ENT_QUOTES, $encode);  $str = preg_replace("/\&\#.*?\;/i", "", $str);          return $str;}
?>