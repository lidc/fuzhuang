// JavaScript Document
function co_click(obj){
	$("#"+obj.id).submit();
}
function onkeydowns(obj){                //网页内按下回车触发
    if(event.keyCode==13)
    {
    	$("#"+obj.id).submit(); 
    	return false;
    }
}
function co_empty(obj){
	$("#"+obj.id).val("");
}

function co_comp(obj){
	// $("#"+obj.id).val(obj.alt);
}

