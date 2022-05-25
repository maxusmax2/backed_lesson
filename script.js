window.onload = ()=>
{
	document.getElementsByClassName("publish-comment")[0].onclick = ()=>
	{
		const request = new XMLHttpRequest();
		const url = "getContent.php";

		var author  =  document.getElementsByClassName('author-comment')[0].value;
		var content  =  document.getElementsByClassName('comment-content')[0].value;

		const params = 'id=' + getUrlVars()['content'] + '&author=' + author + '&content='+content;

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		request.addEventListener("readystatechange", () => {

		    if(request.readyState === 4 && request.status === 200) 
		    {       
				document.getElementsByClassName('comments')[0].innerHTML +=  request.responseText;
		    }
			});
		request.send(params);
		var author  =  document.getElementsByClassName('author-comment')[0].value = "";
		var content  =  document.getElementsByClassName('comment-content')[0].value = "";
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