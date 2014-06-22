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

var pag_source = "\
<!DOCTYPE html>\
<html>\
<head>\
  <meta charset=\"utf-8\">\
  <title>Policy Decision Helper</title>\
  <link rel=\"stylesheet\" href=\"http://evolvingweb.github.io/ajax-solr/examples/reuters/css/reuters.css\">\
  <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>\
  <script src=\"http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js\"></script>\
  <link rel=\"stylesheet\" href=\"http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css\">\
</head>\
<body>\
  <div id=\"wrap\">\
    <div id=\"header\">\
      <h1>Policy Decision Helper</h1>\
    </div>\
\
    <div class=\"right\">\
      <div id=\"result\">\
        <div id=\"navigation\">\
          <ul id=\"pager\"></ul>\
          <div id=\"pager-header\"></div>\
        </div>\
        <div id=\"docs\"></div>\
      </div>\
    </div>\
\
    <div class=\"left\">\
      <h2>Current Selection</h2>\
      <ul id=\"selection\"></ul>\
\
      <h2>Search</h2>\
      <span id=\"search_help\">(press ESC to close suggestions)</span>\
      <ul id=\"search\">\
        <input type=\"text\" id=\"query\" name=\"query\" autocomplete=\"off\">\
      </ul>\
\
      <h2>Top Topics</h2>\
      <div class=\"tagcloud\" id=\"topics\"></div>\
\
      <div class=\"clear\"></div>\
    </div>\
    <div class=\"clear\"></div>\
  </div>\
</body>\
</html>\
";

var httpserver = http.createServer(function (request, response) {
	var pathName = url.parse(request.url).pathname;
	/*var ext = pathName.match(/(\.[^.]+|)$/)[0];
	if (ext == ".css" ){
		fs.readFile("."+request.url, 'utf-8',function (err, data) {
			if (err) throw err; 
			response.writeHead(200, { 
			"Content-Type": { 
			".css":"text/css", 
	".js":"application/javascript", 
}[ext] 
}); 
response.write(data); 
response.end(); 
}); 
	}*/

	response.writeHead(200, {'Content-Type': 'text/html'});
	response.write(pag_source);
	response.end();
})
httpserver.listen(8080);  
  
console.log('Server running on port 8080.');







 