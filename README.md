2014/6/3
This repository was created by Guanqun Mao, Xinpi Du, and Weijie Huo @Grey House

-------------------------------------------------------------------


## Preprocess Procedure

How to preserve keywords into solr database:

Start Solr server first (Tutorial: https://lucene.apache.org/solr/tutorial.html ), keep it running. 

	
	
	
Find the directory bing-search directory, run: 
	./run.sh KEYWORD
run.sh searches KEYWORD from bing server to get the relevant urls, then it will store {KEYWORD, URLS} into a json file. The json file would be posted to solr server finally. 





To query keyword in solr, open the browser and go to:
	http://localhost:8983/solr/#/collection1/query?q=KEYWORD

All the relevant queries will be displayed. 



## GUI



## Apache SOLR
Solr tutorial, Go to https://lucene.apache.org/solr/4_8_1/tutorial.html

The command for posting different type of files: https://cwiki.apache.org/confluence/display/solr/Simple+Post+Tool

	
## NLP


