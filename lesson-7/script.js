var notSortArr = [];
var sortArr = [];
window.onload = ()=>
{
	document.getElementsByClassName("randArr")[0].onclick = ()=>
	{
		
		const request = new XMLHttpRequest();
		const url = "/getRandArray.php";

		var len  =  document.getElementsByClassName('lenArr')[0].value;
		

		const params = 'lenArr='+len;

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		request.addEventListener("readystatechange", () => {

		    if(request.readyState === 4 && request.status === 200) 
		    {       

				document.getElementsByClassName('printArrRand')[0].innerHTML =  request.responseText;
				notSortArr = request.responseText;
		    }
		});
		request.send(params);
	};
	document.getElementsByClassName("sortArr")[0].onclick = ()=>
	{
		
		const request = new XMLHttpRequest();
		const url = "/getSortArr.php";

		var selected  =  document.getElementsByClassName('selectedSort')[0];
		var selectedSort = selected.options[selected.selectedIndex].value;

		const params = 'sort='+selectedSort+"&arr="+ notSortArr;

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		request.addEventListener("readystatechange", () => {

		    if(request.readyState === 4 && request.status === 200) 
		    {       
		    	var resp = JSON.parse(request.responseText);
				document.getElementsByClassName('printArrSort')[0].innerHTML =  "Отсортированный массив: "+resp[0]
																				+"<br>"+"Прожедшее время: "+resp[1];
				sortArr = resp[0];
				
		    }
		});
		request.send(params);
	};
	document.getElementsByClassName("searchArr")[0].onclick = ()=>
	{
		
		const request = new XMLHttpRequest();
		const url = "/getSearchElement.php";

		var selectedElem = document.getElementsByClassName('searchableElem')[0].value;
		var selected  =  document.getElementsByClassName('selectedSearch')[0];
		var selectedSearch = selected.options[selected.selectedIndex].value;

		const params = 'sort='+JSON.stringify(sortArr)+"&notsort="+ notSortArr+"&search="+selectedSearch+"&element="+selectedElem;

		request.open("POST", url, true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		request.addEventListener("readystatechange", () => {

		    if(request.readyState === 4 && request.status === 200) 
		    {       
				document.getElementsByClassName('printSearchElem')[0].innerHTML =  request.responseText;
				
				
		    }
		});
		request.send(params);
	};


}