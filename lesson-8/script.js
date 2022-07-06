window.onload = ()=>
{
	btnDownload = document.getElementsByClassName("download-fake-json")[0];
	btnDownload.addEventListener('click', ()=>{
		fetch('https://jsonplaceholder.typicode.com/posts/1')
  		.then((response) => response.json())
  		.then((json) =>
		{
			var valSelectedStorage = document.getElementsByClassName("download")[0];

	  		switch (valSelectedStorage.options[valSelectedStorage.selectedIndex].value)
	  		{
	  			case 'cookie':
	  				document.cookie = json['body'];
	  				break;
	  			case 'session':
	  				sessionStorage.setItem('response',json['body']);
	  				break;
	  			case 'local':
	  				localStorage.setItem('response',json['body']);
	  				break;
	  		}  	
		});
	});

	btnGet = document.getElementsByClassName("get-fake-json")[0];
	btnGet.onclick =  function(){
		var response = '';
		var valSelectedStorage = document.getElementsByClassName("get")[0];

  		switch (valSelectedStorage.options[valSelectedStorage.selectedIndex].value)
  		{
  			case 'cookie':
  				if (document.cookie)
  				{
  					response = document.cookie;
  				}
  				break;
  			case 'session':
  				if (sessionStorage.getItem('response'))
  				{
  					response = sessionStorage.getItem('response');
  				}
  				break;
  			case 'local':
  				if (localStorage.getItem('response'))
  				{
  					response = localStorage.getItem('response');
  				}
  				break;
  		}
  		var textbox = document.getElementsByClassName('json')[0];
  		textbox.innerHTML = response;
	};
}