
<!--
Important: Note that Javascript runs on client side and PHP runs on server side.
-->
<?php

	$arr = array(	"Country" => array("US", "Japan", "Mexico", "Canada", "French"),
					"Food"	  => array("mushrooms", "green peppers", "onions", "tomatoes", "olives"),
					"Animal"  => array("cat", "dog", "pig", "chicken"),	
					"Sports"  => array("basketball", "football", "tennis", "pingpong", "volleyball")
			);

?>


<!DOCTYPE html>
<html>
	<p id = "testing">Cool</p>
	<head>
		<script language="javascript" type="text/javascript">

			//displayDate is for testing...-->
			function displayDate(){
				document.getElementById("testing").innerHTML=Date();
			}

			var arr_sellected = {};

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

			function selectDel(obj, Div_name, att){
			 	var dobj=document.getElementById(obj);
			 	var selectValue=selectID(obj);
			 	var sv=selectValue.split(",");

			 	for (var j=0;j<sv.length;j++){
			    	for (var i = 0; i < dobj.options.length; i++) {       
			   			selectValue=dobj.options[dobj.options.selectedIndex].value;
			            if (dobj.options[i].value == sv[j]){
			                 dobj.options.remove(i);
			                 add(dobj, Div_name, sv[j], att);      
			            }       
			        }
			 	}
			}

			function add(dobj, Div_name, Obj_name, att) {
		        var divMain = document.getElementById(Div_name);
		        var but = document.createElement('button'); 	
		        but.innerHTML = Obj_name;
		        but.onclick = function(){
		        	//Add option in Select tab
		        	dobj.options.add(new Option(Obj_name));

		        	//Delete button in corresponding div
		        	document.getElementById(Div_name).removeChild(this);

		        	//Update arr_sellected
		        	for (var i = 0; i < arr_sellected[att].length; i++){
		        		if (arr_sellected[att][i] == this.innerHTML){
		        			delete arr_sellected[att][i];
		        			break;
		        		}
		        	}
		        };
		        divMain.appendChild(but);

		        //Add the selected object to $arr_sellected 
		        if(!(att in arr_sellected)){
		        	arr_sellected[att] = [];
		        }
		        arr_sellected[att].push(Obj_name);
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
						sort($obj_arr);
						$temp_id = $att . "_tab";
						$temp_div = $att . "_div";
						echo "<td>";
							echo "<SELECT id =\"" . $temp_id ."\" MULTIPLE SIZE=5 >";
								foreach($obj_arr as $key => $obj){
									echo "<OPTION VALUE= \"" . $obj . "\">" . $obj;
								}
							echo "</SELECT>";

							echo "<button onclick = \"selectDel('" . $temp_id . "', '" . $temp_div . "', '" . $att ."')\">Add</button>";
							
						echo "</td>";
					}
				?>	
			</tr>
		</table> 

		</br></br></br></br>
		
		<?php
			foreach($arr as $att => $obj_arr){
				$temp_div = $att . "_div";
				echo "<div id = \"" . $temp_div . "\"> 
							<p>" . $att . ":</p>
					  </div>";
			}

		?>

		</br></br></br></br>

		<button onclick = "">Search</button>

	</body>
</html> 

