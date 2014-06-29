import java.text.ParseException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;


public class ParseJson {

    public static String BuildJson() throws JSONException {

        
        JSONObject jo = new JSONObject();


        Map<String, String> map1 = new HashMap<String, String>();
        map1.put("name", "Alexia");
        map1.put("sex", "female");
        map1.put("age", "23");

        Map<String, String> map2 = new HashMap<String, String>();
        map2.put("name", "Edward");
        map2.put("sex", "male");
        map2.put("age", "24");

        List<Map> list = new ArrayList<Map>();
        list.add(map1);
        list.add(map2);

        Employee employee = new Employee();
        employee.setName("wjl");
        employee.setSex("female");
        employee.setAge(24);

        // Map to JSONArray
        JSONArray ja = new JSONArray();
        ja.put(map1);

        System.out.println("JSONArray Object data：");
        System.out.println(ja.toString());

        // Javabean to Json（Need Map as mid transition）
        JSONObject jo1 = JsonHelper.toJSON(employee);

        System.out.println("\n Only Containing Employee Object, Json：");
        System.out.println(jo1.toString());

        // build Json，including a map and a json which contain Employee object.
        jo.put("map", ja);
        jo.put("employee", jo1.toString());
        System.out.println("\nJson：");
        System.out.println(jo.toString());

        return jo.toString();

    }

   //Parse Json
    public static void ParseJson(String jsonString) throws JSONException,
            ParseException {

        JSONObject jo = new JSONObject(jsonString);
        JSONArray ja = jo.getJSONArray("map");

        System.out.println("\n Json to Map：");
        System.out.println("name: " + ja.getJSONObject(0).getString("name")
                + " sex: " + ja.getJSONObject(0).getString("sex") + " age: "
                + ja.getJSONObject(0).getInt("age"));

        String jsonStr = jo.getString("employee");
        Employee emp = new Employee();
        JsonHelper.toJavaBean(emp, jsonStr);

        System.out.println("\n Json to Employee：");
        System.out.println("name: " + emp.getName() + " sex: " + emp.getSex()
                + " age: " + emp.getAge());

    }

  
    public static void main(String[] args) throws JSONException, ParseException {
        // Auto-generated method 

        ParseJson(BuildJson());
    }

}