rm -f Bing.class
javac -cp .:commons-codec-1.9.jar:json-simple-1.1.jar  Bing.java
#echo "$@"
java -cp .:commons-codec-1.9.jar:json-simple-1.1.jar  Bing "$@"  > test.json
