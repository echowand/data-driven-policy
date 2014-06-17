<?php

	$arr = array(	"country" => array("US", "Japan", "Mexico", "Canada", "French"),
					"food"	  => array("mushrooms", "green peppers", "onions", "tomatoes", "olives"),
					"animal"  => array("cat", "dog", "pig", "chicken"),	
					"sports"  => array("basketball", "football", "tennis", "pingpong", "volleyball")
			);
?>


<!DOCTYPE html>
<html>
	<script type=\"text/javascript\">

		function selectID(obj){
		    var len = o.length;
		    var str = "";
		    for(var i=0;i<len ;i++ ){
		     	if (o[i].selected==true){
		      		str +=o[i].value+",";
		     	}
		    }
		    return(str);
	 	}

		function selectDel(obj, Div_name){
		 	var dobj=document.getElementById(obj);
		 	var selectValue=selectID(obj);
		 	var sv=selectValue.split(",");
		 	for (var j=0;j<sv.length;j++){
		    	for (var i = 0; i < dobj.options.length; i++) {       
		   			selectValue=dobj.options[dobj.options.selectedIndex].value;
		            if (dobj.options[i].value == sv[j]){
		                 dobj.options.remove(i);
		                 btnClick(Div_name, sv[j]);      
		            }       
		        }
		 	}
		}

		function displayDate(){
			document.getElementById("demo").innerHTML=Date();
		}

		function show(){ 
			alert(document.countries.options[document.coutries.selectedIndex].text); 
		}

		function btnClick(Div_name, Sel_name) {
	        var divMain = document.getElementById(Div_name);
	        var input = document.createElement("input"); 	/*build input tab.*/
	        input.type = "button";
	        input.value = Sel_name;
	        divMain.appendChild(input);						/*add the newly built input tab to the corresponding division.*/
		}

		function hello(){
			var divMain = document.getElementById("");
	        var input = document.createElement("input"); 	/*build input tab.*/
	        input.type = "button";
	        input.value = Sel_name;
	        divMain.appendChild(input);	
		}

	</script>

	<head>
		<h1>This is only a test!!!</h1>
	</head>

	<body>
		<table width="200" border="0" cellspacing="0" cellpadding="0">  
		  	<tr>
		  		<?php
		  			foreach($arr as $key => $val){
		  				echo "<td>&nbsp;" . $key . "</td>";
		  			}
		  		?>
		  	</tr>

			<tr>
				<?php
					foreach($arr as $att => $obj_arr){
						$temp_id = $att . "_tab";
						$temp_div = $att . "_div";
						echo "<td>";
							echo "<SELECT id =\"" . $temp_id ."\" MULTIPLE SIZE=5 >";
								foreach($obj_arr as $obj){
									echo "<OPTION VALUE= \"" . $obj . "\">" . $obj;
								}
							echo "</SELECT>";

							print "<button type = 'button' onClick = \"selectDel('" . $temp_id . "', '" . $temp_div . "')\">Add</button>";
							//echo "<button type = 'button' onClick = \"selectDel('" . $temp_id . "', '" . $temp_div . "')\">Add</button>";
							//echo "<button type = 'button' onclick = \"hello()\">AAdd</button>";
						echo "</td>";
					}
				?>	
			</tr>
		</table> 

		</br>
		</br>
		</br>
		</br>
		
		<?php
			/*foreach($arr as $att => $obj_arr){
				$temp_div = $att . "_div";
				echo "<div id = \"" . $temp_div . "\"> 
							<p>" . $att . ":</p>
					  <div>";
			}*/

		?>


		<div id = "country_div">
			<p>Country:</p>

		</div>

		<div id = "food_div">
			<p>Food:</p>
		</div>

		<div id = "animal_div">
			<p>Animal:</p>
		</div>

		<div id = "sports_div">
			<p>Sports:</p>
		</div>

	</body>
</html> 

