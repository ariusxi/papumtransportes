function hidemessage(div){
	setTimeout(function(){
		$(div).find('div').fadeOut();
	}, 3000);
}