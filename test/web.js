//Find the selected the element and retern them as a stream 

var database = {};
database["Country"] = ["US", "Japan", "Mexico", "Canada", "French"];
database["Food"] = ["mushrooms", "green peppers", "onions", "tomatoes", "olives"];
database["Animal"] = ["cat", "dog", "pig", "chicken"];
database["Sports"] = ["basketball", "football", "tennis", "pingpong", "volleyball"];

var arr_sellected = {};

//Server that handle http request and response.
var http = require('http'); 

var fs = require('fs');

var url = require('url');

var path = require('path');

var getContentType=function(filePath){
	var contentType="";
	var extension=path.extname(filePath);
	switch(extension){
		case ".html":
			contentType= "text/html";
			break;
		case ".js":
			contentType="text/javascript";
			break;
		case ".css":
			contentType="text/css";
			break;
		case ".gif":
			contentType="image/gif";
			break;
		case ".jpg":
			contentType="image/jpeg";
			break;
		case ".png":
			contentType="image/png";
			break;
		case ".ico":
			contentType="image/icon";
			break;
		default:
			contentType="application/octet-stream";
	}
	return contentType; 
}

var httpserver = http.createServer(function (request, response) {
	var pathName = url.parse(request.url).pathname;
	pathName = "." + pathName;
	if(pathName.charAt(pathName.length-1)=="/"){
		pathName+="index.html";
	}

	//console.log(pathName);

	var filePath = pathName;
	fs.exists(filePath, function(exists){
		if(exists){
			fs.readFile(filePath, 'utf-8',function (err, data) {
				if (err) throw err;
				response.writeHead(200, {"Content-Type": getContentType(filePath) });
				response.write(data);
				response.end();
			}); 
		}
		else{
			response.writeHead(404, {"Content-Type": "text/html"});
			response.end("<h1>404 Not Found</h1>");
		}
	});

	var body = [];
	console.log(request.method);
	console.log(request.headers);
    request.on('data', function (chunk) {
        console.log('BODY: ' + chunk);
    });
    request.on('close', function () {
    	console.log();
    });
	
})
httpserver.listen(8080);  
  
console.log('Server running on port 8080.');







 