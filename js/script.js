window.onload = ()=>
{
	document.getElementsByClassName("comment__publish")[0].onclick = ()=>
	{
		const request = new XMLHttpRequest();
		const url = "/getArticle/getArticle.php";

		var author  =  document.getElementsByClassName('comment__author')[0].value;
		var content  =  document.getElementsByClassName('comment__content')[0].value;

		const params = 'id=' + getUrlVars()['id'] + '&author=' + author + '&content='+content;

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		request.addEventListener("readystatechange", () => {

		    if(request.readyState === 4 && request.status === 200) 
		    {       
				document.getElementsByClassName('comment__items')[0].innerHTML +=  request.responseText;
				
		    }
		});
		request.send(params);
		document.getElementsByClassName('comment__author')[0].value = "";
		document.getElementsByClassName('comment__content')[0].value = "";
		};
	;

}

function getUrlVars() {

    var vars = {};
    
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });

    return vars;
}