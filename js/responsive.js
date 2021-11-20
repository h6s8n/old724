function toggle_responsive()
{
	$(".booksample").css("height",(1067*$(".booksample").width())/800);
	
	
	var vpw=$("html, body").width();
	var vph=$("html, body").height();
}
window.onresize=function(){toggle_responsive();};
toggle_responsive();

setInterval(toggle_responsive,1000);