import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.DBCursor;
import com.mongodb.DBObject;
import com.mongodb.Mongo;
import com.mongodb.WriteResult;




public class Connect_db {
    
    private Mongo mongo;
    private DBCollection dbCollection;
    private DB db;
    
    public Connect_db() throws Exception{
        //Use ip address to build a new mongo database
        mongo=new Mongo("127.0.0.1");
        //get the db.
        db=mongo.getDB("orcl");
        //test if there exists "person"
        boolean b=db.collectionExists("person");
        System.out.println("If there exists [person]:"+b);
        dbCollection = db.getCollection("person");
        long count=dbCollection.count();
        System.out.println("Get how many persons there is:"+count);
        DBCursor cursor =dbCollection.find().skip(20).limit(20);
        while(cursor.hasNext()){
            System.out.println(cursor.next());
        }
        
        
    }
    
    
    
    public void list(){
        dbCollection=db.getCollection("person");
        BasicDBObject dbObject=new BasicDBObject();
        dbObject.put("age", new BasicDBObject("$gt",20).append("$lt", 60));
        DBCursor cursor = dbCollection.find(dbObject);
        System.out.println(cursor.count());
        while(cursor.hasNext()){
            System.out.println(cursor.next());
        }
        
    }
    
    
    
    private boolean insert(){
        
        dbCollection=db.getCollection("person");
        BasicDBObject dbObject=new BasicDBObject();
        dbObject.put("name", "zhangsan");
        dbObject.put("age", 20);
        WriteResult writeResult = dbCollection.save(dbObject);
        System.out.println(writeResult.getN());
        return false;
    }
    
    private boolean delete(){
        dbCollection=db.getCollection("person");
        BasicDBObject dbObject=new BasicDBObject();
        dbObject.put("name", "zhangsan");
        WriteResult writeResult = dbCollection.remove(dbObject);
        System.out.println(writeResult.getN());
        return false;
    }
    
    
    private boolean update(){
        dbCollection=db.getCollection("person");
        BasicDBObject dbObject=new BasicDBObject();
        dbObject.put("name", "s0020");
        BasicDBObject dbObject2=new BasicDBObject();
        dbObject2.put("name", "s0020");
        dbObject2.put("age", 65);
        WriteResult writeResult = dbCollection.update(dbCollection.findOne(dbObject), dbObject2);
        System.out.println(writeResult.getN());
        return false;
    }
    
    
    private Object getOne(){
        dbCollection=db.getCollection("person");
        BasicDBObject dbObject=new BasicDBObject();
        dbObject.put("name", "s0020");
        //dbObject.put("age", 65);
        DBObject object=dbCollection.findOne(dbObject);
        System.out.println(object.toMap().get("name")+"\t"+object.toMap().get("age"));
        return object;
    }
    
    
    public static void main(String[] args) throws Exception{
        Connect_db mongodb=new Connect_db();
        mongodb.insert();
        //mongodb.getOne();
        //mongodb.update();
        //mongodb.delete();
        mongodb.list();
    }
}