rm -f Bing.class
javac -cp .:commons-codec-1.9.jar:json-simple-1.1.jar  Bing.java
#echo "$@"
rm -f test.json
java -cp .:commons-codec-1.9.jar:json-simple-1.1.jar  Bing "$@"  > test.json
java -Dtype=application/json -jar post.jar test.json
