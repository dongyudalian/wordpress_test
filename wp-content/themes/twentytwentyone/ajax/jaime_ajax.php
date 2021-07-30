<?php
//1.　全てサイトで追加する
function jaime_ajax_all() {
?>
    <script>

        function showHint(str)
		{
			if (str.length==0)
			{ 
				document.getElementById("txtHint").innerHTML="";
				return;
			}
			if (window.XMLHttpRequest)
			{
				// IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
				xmlhttp=new XMLHttpRequest();
			}
			else
			{    
				//IE6, IE5 浏览器执行的代码
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","ajax_used.php?q="+str,true);
			xmlhttp.send();
		}

		function showSite(str)
		{
			if (str=="")
			{
				document.getElementById("txtHint_sql").innerHTML="";
				return;
			} 
			if (window.XMLHttpRequest)
			{
				// IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
				xmlhttp=new XMLHttpRequest();
			}
			else
			{
				// IE6, IE5 浏览器执行代码
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("txtHint_sql").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","getsite_mysql.php?q="+str,true);
			xmlhttp.send();
		}

    </script>
<?php
}
add_action('wp_head', 'jaime_ajax_all');