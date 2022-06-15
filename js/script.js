window.onload = ()=>
{
	document.getElementsByClassName("comment__publish")[0].onclick = async ()=>
	{
		const url = "/getArticle/getArticle.php";

		var id = getUrlVars()['id'];
		var author  =  document.getElementsByClassName('comment__author')[0].value;
		var content  =  document.getElementsByClassName('comment__content')[0].value;
		var data = {'id':id,"author":author,"content":content};

		let responce = await fetch(url, {
			method: 'POST',
			header: {"Content-type" : "application/json;charset = utf-8"
			},
			body:JSON.stringify(data)
		})

		let result = await responce.text();
		if(responce.ok)
		{
			document.getElementsByClassName('comment__items')[0].innerHTML +=  result;
		}

		document.getElementsByClassName('comment__author')[0].value = "";
		document.getElementsByClassName('comment__content')[0].value = "";
	};
	document.getElementsByClassName("donate")[0].onclick = async ()=>
	{
		const url = "/getArticle/getConvertValute.php";
		var valute  =  document.getElementsByClassName('donate_valute')[0].value;
		var value = document.getElementsByClassName('valute_value')[0].value;
		var data = {"valute":valute,"value":value};

		let responce = await fetch(url, {
			method: 'POST',
			header: {"Content-type" : "application/json;charset = utf-8"
			},
			body:JSON.stringify(data)
		})

		let result = await responce.text();
		if(responce.ok)
		{
			alert(result);
		}
	};

}

function getUrlVars() {

    var vars = {};
    
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });

    return vars;
}