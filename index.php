<?php

	$arr = array(	"Country" => array("US", "Japan", "Mexico", "Canada", "French"),
					"Food"	  => array("mushrooms", "green peppers", "onions", "tomatoes", "olives"),
					"Animal"  => array("cat", "dog", "pig", "chicken"),	
					"Sports"  => array("basketball", "football", "tennis", "pingpong", "volleyball")
			);

	$arr_sellected = array(
					"Country" => array(),
					"Food"	  => array(),
					"Animal"  => array(),	
					"Sports"  => array()
			);
?>


<!DOCTYPE html>
<html>
	<head>
		<script language="javascript" type="text/javascript">
			function selectID(obj){
				var o = document.getElementById(obj).options;
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
			                 add(Div_name, sv[j]);      
			            }       
			        }
			 	}
			}

			function add(Div_name, Sel_name) {
		        var divMain = document.getElementById(Div_name);
		        var input = document.createElement("input"); 	/*build input tab.*/
		        input.type = "button";
		        input.
		        input.value = Sel_name;
		        input.onclick = 
		        divMain.appendChild(input);						/*add the newly built input tab to the corresponding division.*/
			}

			function cancel(){

			}

		</script>

	
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

							echo "<button type = 'button' onclick = \"selectDel('" . $temp_id . "', '" . $temp_div . "')\">Add</button>";
							
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
			foreach($arr as $att => $obj_arr){
				$temp_div = $att . "_div";
				echo "<div id = \"" . $temp_div . "\"> 
							<p>" . $att . ":</p>
					  </div>";
			}

		?>

	</body>
</html> 

