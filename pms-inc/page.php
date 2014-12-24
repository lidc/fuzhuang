<?
class mysqlPager{ 
var $pagePerNum=10;//每页显示数据项数 
var $pagePerGroup=5;//每分页组中页数 
var $curPage=0;//当前页，Defualt 第一页 
var $totalPage=0;//总页数 
var $totalNum=0;//数据项总数 
var $curPageGroup=0;//当前分页组 
var $curPageUrl="";//当前用到分页的 URL 
var $customStyle="";//自定义风格 
var $pageQuerySql=""; 
function mysqlPager(){//构造函数 PHP4 
} 
/** 
* 初始化所有变量 
*/ 
function InitAllVar($totalNum,$pagePerGroup,$curPageUrl,$pagePerNum,$curPage=1,$curPageGroup=1) 
{ 
$this->totalNum=$totalNum; 
$this->pagePerGroup=$pagePerGroup; 
$this->curPageUrl=$curPageUrl; 
$this->curPage=$curPage; 
$this->curPageGroup=$curPageGroup;
$this->pagePerNum=$pagePerNum; 
} 
/** 
* 设置当前页变量 
* 
* @param 数字 $curPage 
*/ 
function setCurPage($curPage) 
{ 
$this->curPage=$curPage; 
} 
/** 
* 设置当前分页组变量 
* 
* @param mixed $curPageGroup 
*/ 
function setCurPageGroup($curPageGroup) 
{ 
$this->curPageGroup=$curPageGroup; 
} 
/** 
* 设置当前用到分布类的URL 
* $curPageUrl string 
*/ 
function setCurPageUrl($curPageUrl) 
{ 
$this->curPageUrl=$curPageUrl; 
} 
/** 
* 获取所有 
* 
* @param 数字 $totalNum 
* @param 数字 $curPage 
* @return float 
*/ 
function getTotalPage($totalNum,$curPage=0) 
{ 
return $this->totalPage=ceil($totalNum/$this->pagePerNum); 
} 
/** 
* 设置用户自定义风格 
* 
* @param mixed $customStyle 
*/ 
function setCustomStyle($customStyle) 
{ 
$this->customStyle=$customStyle; 
} 
/** 
* 设置用户自定义风格返回字符串 
* 
* 
* @param mixed $pagerString 
*/ 
function setCustomStyleString($pagerString) 
{ 
return $styleString="<span class=\"".$this->customStyle."\">".$pagerString."</span>"; 
} 
/** 
* 输出导航页信息 可以不用参数，但是在使用前一定要设置相应的变量 
* 
* @param mixed $curPageGroup 
* @param mixed $curPage 
* @param mixed $curPageUrl 
*/ 
function showNavPager($curPageGroup=0,$curPage=0,$curPageUrl=0) 
{ 
if($curPageGroup) 
{ 
$this->curPageGroup=$curPageGroup; 
} 
if($curPage) 
{ 
$this->curPage=$curPage; 
} 
if($curPageUrl) 
{ 
$this->curPageUrl=$curPageUrl; 
} 
$rtnString=""; 
//判断变量是否以经初始化 
if($this->curPageGroup && $this->curPageUrl && $this->totalNum && $this->curPage) 
{
//$rtnString="<li>Total num:".$this->totalNum."</li>";
$this->totalPage=$this->getTotalPage($this->totalNum);
//$rtnString.="<li>Total page:".$this->totalPage."</li>"; 
if($this->curPage==1) 
$this->curPage=($this->curPageGroup-1)*$this->pagePerGroup+1; 
if($this->curPageGroup!=1) 
{ 
$prePageGroup=$this->curPageGroup-1; 
//$rtnString.="<li><a href=".$this->curPageUrl."&cpg=$prePageGroup >".$this->setCustomStyleString("<<")."</a></li> ";
$rtnString.="<a href=".$this->curPageUrl."&cpg=$prePageGroup >".$this->setCustomStyleString("<<")."</a>";  
} 
for($i=1;$i<=$this->pagePerGroup;$i++) 
{ 
$curPageNum=($this->curPageGroup-1)*$this->pagePerGroup+$i; 
if($curPageNum<=$this->totalPage){ 
if($curPageNum==$this->curPage) 
{ 
//$rtnString.="<li>".$this->setCustomStyleString($curPageNum)."</li>";
$rtnString.="<a>".$this->setCustomStyleString($curPageNum)."</a>";  
}else 
{ 
//$rtnString.="<li><a href=".$this->curPageUrl."&cpg={$this->curPageGroup}&cp=$curPageNum >";
//$rtnString.=$curPageNum."</a></li>";
$rtnString.="<a href=".$this->curPageUrl."&cpg={$this->curPageGroup}&cp=$curPageNum >";
$rtnString.=$curPageNum."</a>";
} 
} 
} 
if($this->curPageGroup<ceil($this->totalPage/$this->pagePerGroup)) 
{ 
$nextPageGroup=$this->curPageGroup+1; 
//$rtnString.="<li><a href=".$this->curPageUrl."&cpg=$nextPageGroup >".$this->setCustomStyleString(">>")."</a></li>";
$rtnString.="<a href=".$this->curPageUrl."&cpg=$nextPageGroup >".$this->setCustomStyleString(">>")."</a>"; 
} 
$this->pageQuerySql=" limit ".(($this->curPage-1)*$this->pagePerNum).",".$this->pagePerNum; 
} 
else 
{ 
$rtnString="Coming Soon"; 
} 
return $rtnString; 
} 
/** 
* 得到完整的查询MYSQL的Sql语句 
* 
* @param mixed $sql 
*/ 
function getQuerySqlStr($sql) 
{ 
$allsql=$sql.$this->pageQuerySql; 
return $allsql; 
} 
/** 
* 设置每页有多少数据项 
* 
* @param INT $num 
*/ 
function setPagePerNum($num) 
{ 
$this->pagePerNum=$num; 
} 
} 
?>