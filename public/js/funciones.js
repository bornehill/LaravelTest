
function popUpWindow(ruta, height, width){
	if(height==null)
		height=430;
	if(width==null)
		width=350;	
    window.open(ruta,'','height='+height+',width='+width+',toolbar=no,minimize=no,status=no,memubar=no,location=no,scrollbars=no');
}