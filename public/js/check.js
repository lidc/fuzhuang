// 使用举例
/**
* 统一验证方法
* Form 元素中输入相关标记
* vmode: ['not null']
* vdisp: 显示信息
* vtype: 校验类型 ['none','string','tabledefine','integer','datetime','date','time','postcode','float','email','phone','mobiletel','ip']
* 例子： <input type="text" name="IPAddress" vmode="not null" vdisp="输入的IP地址" vtype="ip" >
*/

// 正则表达式定义

var validrule = new Object();
validrule.string = /^([^'<>]+)?$/; 
validrule.tabledefine = /^([A-Za-z][A-Za-z0-9|_]{1,18})?$/; 
validrule.integer = /^(\d*)$/; 
validrule.date = /^((([1-9]\d{3})|([1-9]\d{1}))-(0[1-9]|1[0-2])-(0[1-9]|[1-2]\d|3[0-1]))?$/; 
validrule.time = /^((0[1-9]|1[0-9]|2[0-4]):([0-5][0-9]):([0-5][0-9]))?$/; 
validrule.datetime = /^((([1-9]\d{3})|([1-9]\d{1}))-(0[1-9]|1[0-2])-(0[1-9]|[1-2]\d|3[0-1]) (0[1-9]|1[0-9]|2[0-4]):([0-5][0-9]):([0-5][0-9]))?$/; 
validrule.postcode = /^(\d{6})?$/; 
validrule.float = /^(([0-9]\d?)($|(\.\d+$)))?$/; 
validrule.email = /^(.+\@.+\..+)?$/; 
validrule.phone = /^(\(\d{3}\))?(\(?(\d{3}|\d{4}|\d{5})\)?(-?)(\d+))?((-?)(\d+))?$/; 
validrule.mobiletel = /^1[3|5|8]\d{9}$/; 
validrule.ip = /^(([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-5][0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-5][0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-5][0-5])\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-5][0-5]))?$/; 
validrule.digits=/^\d+$/;
function doValidate(vform) 
{
   var thePat = "";
   var strFormatInfo = "";
   for(var i=0;i<vform.length;i++)
   {
	    var element=vform[i];
		if(element.getAttribute("vmode")!= null && element.getAttribute("vmode") == "not null")
		{
			
			   if(element.value.length == 0) 
               {
                  alert(element.getAttribute("vdisp")+" is not null!")
                  element.focus();
                  return false;
               }
		}
		if(element.getAttribute("vtype") == null) 
        {
           continue;
	    }
		if(element.getAttribute("vtype")=="none")
        { 
           thePat = "";
           strFormatInfo = "";
        }
        if(element.getAttribute("vtype")=="string")
        { 
           thePat = validrule.string;
           strFormatInfo = "asd";
        }
		if(element.getAttribute("vtype")=="tabledefine") 
        { 
           thePat = validrule.tabledefine;
           strFormatInfo = "p_tablename";
        }
        if(element.getAttribute("vtype")=="integer") 
        { 
           thePat = validrule.integer;
           strFormatInfo = "123456";
        }
        if(element.getAttribute("vtype")=="datetime") 
        { 
           thePat = validrule.datetime;
           strFormatInfo = "2004-08-12 08:37:29";
        }
        if(element.getAttribute("vtype")=="date") 
        { 
           thePat = validrule.date;
           strFormatInfo = "2004-08-12";
        }
        if(element.getAttribute("vtype")=="time") 
        { 
           thePat = validrule.time;
           strFormatInfo = "08:37:29";
        }
        if(element.getAttribute("vtype")=="postcode") 
        { 
           thePat = validrule.postcode;
           strFormatInfo = "100001";
        }
        if(element.getAttribute("vtype")=="float") 
        { 
           thePat = validrule.float;
           strFormatInfo = "356.32";
        }
        if(element.getAttribute("vtype")=="email") 
        { 
           thePat = validrule.email;
           strFormatInfo = "msm@hotmail.com";
        }
        if(element.getAttribute("vtype")=="phone") 
        { 
           thePat = validrule.phone;
           strFormatInfo = "010-67891234";
        }
        if(element.getAttribute("vtype")=="mobiletel") 
        { 
           thePat = validrule.mobiletel;
           strFormatInfo = "13867891234";
        }
        if(element.getAttribute("vtype")=="digits") 
        { 
           thePat = validrule.digits;
           strFormatInfo = "1234";
        }
        if(element.getAttribute("vtype")=="ip") 
        { 
           thePat = validrule.ip;
           strFormatInfo = "172.22.169.11";
        }
		var gotIt = null; 
        if(thePat!="")
        {
           gotIt = thePat.exec(element.value);
        } 
        if(gotIt == null) 
        {
           alert(element.getAttribute("vdisp")+" Illegal input format should be:"+strFormatInfo);
           element.focus();
           return false;
        }
   }
return true;
}

function msgbox(str,str1,w,h){ 
    var msgw,msgh,bordercolor; 
    msgw=w;//提示窗口的宽度 
    msgh=h;//提示窗口的高度 
    titleheight=25 //提示窗口标题高度 
    bordercolor="#777";//提示窗口的边框颜色 
    titlecolor="#99CCFF";//提示窗口的标题颜色 
  
    var sWidth,sHeight; 
    sWidth=document.documentElement.clientWidth; 
    sHeight=document.documentElement.clientHeight; 
    //var bgObj=document.createElement("div"); 
    //bgObj.setAttribute('id','bgDiv');
	var bgObj=document.getElementById(str); 
    bgObj.style.position="absolute"; 
    bgObj.style.top="0"; 
    //bgObj.style.background="#ffffff"; 
    //bgObj.style.filter="progid:DXImageTransform.Microsoft.Alpha(style=3,opacity=25,finishOpacity=75"; 
    //bgObj.style.opacity="0.6"; 
    bgObj.style.left="0"; 
    bgObj.style.width=sWidth + "px"; 
    bgObj.style.height=sHeight + "px"; 
    bgObj.style.zIndex = "10000"; 
    bgObj.style.display='';
	
	//var msgObj=document.createElement("div") 
    //msgObj.setAttribute("id","msgDiv");
	var msgObj=document.getElementById(str1); 
    msgObj.setAttribute("align","left"); 
    msgObj.style.background="white"; 
    //msgObj.style.border="1px solid " + bordercolor; 
    msgObj.style.position = "absolute"; 
    msgObj.style.left = "40%"; 
    msgObj.style.top = "40%"; 
    msgObj.style.font="12px/1.6em Verdana, Geneva, Arial, Helvetica, sans-serif"; 
    //msgObj.style.marginLeft = "-390px" ; 
    //msgObj.style.marginTop = -225+document.documentElement.scrollTop+"px"; 
    msgObj.style.width = msgw + "px"; 
    msgObj.style.height =msgh + "px"; 
    msgObj.style.textAlign = "left"; 
    msgObj.style.lineHeight ="25px"; 
    msgObj.style.zIndex = "10001"; 
   
}

function cse(id)
{
	var obj=document.getElementById(id);
	obj.style.display='none';
}

function Null(str){
	if(typeof(str)=="undefined"||str=="")
		return true;
	else
		return false;
}
var w3c=(document.getElementById)?true:false;
var agt=navigator.userAgent.toLowerCase();
var ie=((agt.indexOf("msie")!=-1)&&(agt.indexOf("opera")==-1)&&(agt.indexOf("omniweb")== -1));
function ieBody(){return (document.compatMode&&document.compatMode!="BackCompat")?document.documentElement:document.body;}
function clientWidth(){return ieBody().clientWidth;}
function clientHeight(){return ieBody().clientHeight;}
function scrollWidth(){return ieBody().scrollWidth;}
function scrollHeight(){return ieBody().scrollHeight;}
function scrollLeft(){return ie?ieBody().scrollLeft:window.pageXOffset;}
function scrollTop(){return ie?ieBody().scrollTop:window.pageYOffset;}
function getId(id){return document.getElementById(id);}
function formatnum(nums,err){
	if(typeof(nums)=="undefined"||nums==""||isNaN(nums))
		return parseInt(err);
	else
		return parseInt(nums);
}
function picView(This,url,e,w,h){	
	if(getId("picViewObj"))document.body.removeChild(getId("picViewObj"));
	w=formatnum(w,300);
	h=formatnum(h,300);
	if(Null(url))url=This.src;
	var pW=clientWidth();
	var pH=clientHeight();
	var sTop=scrollTop();
	var obj=document.createElement("img");
	document.body.appendChild(obj);
	obj.id="picViewObj";
	obj.style.display="none";
	obj.style.position="absolute";
	obj.style.zIndex = "10001";
	obj.style.border="1px solid #ccc";
	setImged=false;
	This.onmousemove=function(e){
		obj.style.display="";
		e=window.event||e;
		var x=e.clientX,y=e.clientY,theTop=parseInt(y+sTop);
		setImg(obj,w,h,url);
		if(!setImged){
			obj.src="images/loading.gif";
			obj.width=32;
			obj.height=32;
			obj.style.left=x+20+"px";
			obj.style.top=theTop+20+"px";
		}else{
			var theW=obj.width,theH=obj.height;
			if(theW+x>pW-50){obj.style.left=x-theW-20+"px";}else{obj.style.left=x+20+"px";}
			if(theH+y>pH-20){obj.style.top=sTop+pH-theH+"px";}else{obj.style.top=theTop+20+"px";}
		}
	}
	This.onmouseout=function(){document.body.removeChild(obj);setImged=false;}
}

function setImg(obj,w,h,url,fun){
	w=formatnum(w,300),h=formatnum(h,300);
	if(Null(url))url=obj.src;
	var image=new Image(),w,h;
	image.onload=function(){
		setImged=true,obj.onload=null,obj.src=url;
		//var wBh=image.width/image.height;
		//if(wBh>=w/h){ww=image.width>=w?w:image.width;hh=ww/wBh;}else{hh=image.height>=h?h:image.height;ww=hh*wBh;}
		//obj.width=ww,obj.height=hh;
		  obj.width=w,obj.height=h;
		//if(fun){eval(fun+"();");}
	}
	image.src=url;
}

function showother(id,isck)
{
	var obj=document.getElementById(id);
	if(isck)
	{
	   obj.style.display="";
	}
	else
	{
	  obj.style.display="none";	
	}
}