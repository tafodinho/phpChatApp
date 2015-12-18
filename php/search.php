<!DOCTYPE html>
<html>
	<head>
		<title>Search</title>
		<script>
		function showUser(str)
		{
			document.getElementById("textHint").innerHTML = "";
			return;
		}
		else
			{
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function()
				{
					if(xmlhttp.readyState == 4 & xmlhttp.status == 200)
					{
						document.getElementById("textHint").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET", "getuser.php?q="+str, true);
				xmlhttp.send();
			}
		}
		</script>
	</head>
	<body>
		<form>
			<select name="users" onchange="showUser(this.value)">
			  <option value="">Select a person:</option>
			  <option value="bamenda">bamenda</option>
			  <option value="buea">buea</option>
			  <option value="douala">douala</option>
			  <option value="yaounde">yaounde</option>
			  </select>
		</form>
		<br>
		<div id="txtHint"><b>Person info will be listed here...</b></div>
	</body>
</html>
