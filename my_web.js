//Find the selected the element and retern them as a stream 

var database = {};
database["Country"] = ["US", "Japan", "Mexico", "Canada", "French"];
database["Food"] = ["mushrooms", "green peppers", "onions", "tomatoes", "olives"];
database["Animal"] = ["cat", "dog", "pig", "chicken"];
database["Sports"] = ["basketball", "football", "tennis", "pingpong", "volleyball"];

var arr_sellected = {};

var funClient = "										\
var arr_sellected = {};									\
function selectID(obj){									\
	var o = document.getElementById(obj).options;		\
    var len = o.length;									\
    var str = \"\";										\
    for(var i=0;i<len ;i++ ){							\
     	if (o[i].selected==true){						\
      		str +=o[i].value+\",\";						\
     	}												\
    }													\
    return(str);										\
}														\
function selectDel(obj, Div_name, att){					\
 	var dobj=document.getElementById(obj);				\
 	var selectValue=selectID(obj);						\
 	var sv=selectValue.split(\",\");					\
 														\
 	for (var j=0;j<sv.length;j++){						\
    	for (var i = 0; i < dobj.options.length; i++) {  \
   			selectValue=dobj.options[dobj.options.selectedIndex].value;	\
            if (dobj.options[i].value == sv[j]){	\
                 dobj.options.remove(i);	\
                 add(dobj, Div_name, sv[j], att);      \
            }       \
        } 	\
 	}	\
}	\
\
function add(dobj, Div_name, Obj_name, att) {	\
    var divMain = document.getElementById(Div_name);\
    var but = document.createElement('button'); 	\
    but.innerHTML = Obj_name;\
    but.onclick = function(){\
    	dobj.options.add(new Option(Obj_name));\
    	document.getElementById(Div_name).removeChild(this);\
    	for (var i = 0; i < arr_sellected[att].length; i++){\
    		if (arr_sellected[att][i] == this.innerHTML){\
    			delete arr_sellected[att][i];\
    			break;\
    		}\
    	}\
    };\
    divMain.appendChild(but);\
    if(!(att in arr_sellected)){\
    	arr_sellected[att] = [];\
    }\
    arr_sellected[att].push(Obj_name);\
}\
function sendRequest(){\
	var xmlhttp;\
	if (window.XMLHttpRequest){\
	  	xmlhttp=new XMLHttpRequest();\
	}\
	else{\
	  	xmlhttp=new ActiveXObject(\"Microsoft.XMLHTTP\");\
	}\
	xmlhttp.open(\"GET\", url ,true);\
	var Selected = \"\";\
	for (var attributes in arr_sellected){\
		for(var index in arr_sellected[attributes]){\
			Selected += arr_sellected[attributes][index];\
		}\
	}\
	xmlhttp.send(\"asdfafasfsd\");\
}\
";


//Server that handle http request and response.
var http = require('http'); 
var urls = require('url');
var util = require('util');

var httpserver = http.createServer(function (request, response) {
	//Being lacy to layout the html in such form, should separate them into separate functions later.
	response.writeHead(200, {'Content-Type': 'text/html'});
	response.write("<!DOCTYPE html>");
	response.write("<html>");
	response.write("<head>");
	response.write("<h1>This is only a test!!!</h1>");
	response.write("<script language=\"javascript\" type=\"text/javascript\">");
	response.write("var url = \"http://10.184.60.44:8080\";");
	response.write(funClient);
	response.write("</script>");
	response.write("</head>");
	response.write("<body>");
	response.write("<table width=\"200\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> ");
	response.write("<tr>");
	for(var attributes in database){
		response.write("<td>&nbsp;");
		response.write(attributes);
		response.write("</td>");
	}
	response.write("</tr>");

	response.write("<tr>");
	for(var attributes in database){
		var tabID = attributes.concat("_tab");
		var divID = attributes.concat("_div");
		database[attributes].sort();
		response.write("<td>");	
		response.write("<SELECT id =\"");
		response.write(tabID);
		response.write("\" MULTIPLE SIZE=5 >");

		for (var index in database[attributes]) {
			response.write("<OPTION VALUE= \"");
			response.write(database[attributes][index]);
			response.write("\">");
			response.write(database[attributes][index]);	
		}
		response.write("</SELECT>");
		response.write("<button onclick = \"selectDel('");
		response.write(tabID);
		response.write("', '");
		response.write(divID);
		response.write("', '");
		response.write(attributes);
		response.write("')\">Add</button>");
		response.write("</td>");
	}
	response.write("</tr>");

	response.write("<table>");
	response.write("</body>");
	response.write("</html>")

	response.write("</br></br></br></br>");

	for(var attributes in database){
		var divID = attributes.concat("_div");
		response.write("<div id = \"");
		response.write(divID);
		response.write("\">");
		response.write("<p>");
		response.write(attributes);
		response.write(": </p></div>");
	}

	response.write("</br></br></br></br>");
	response.write("<button onclick = \"sendRequest()\">Search</button>");
	response.end();

	var body = [];
	console.log(request.method);
	console.log(request.headers);
    request.on('data', function (chunk) {
        console.log('BODY: ' + chunk);
    });
    request.on('close', function () {
    	console.log();
    });
}
)
httpserver.listen(8080);  
  
console.log('Server running on port 8080.');
 