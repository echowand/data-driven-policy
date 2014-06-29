import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

import net.sf.json.JSONArray;
import net.sf.json.JSONObject;

public class Parse_json {
//You have to modify this, if we use different json file. path as well.
	public static void main(String[] args) {

		String JsonContext = new Test_json().ReadFile("/homes/du25/scratch/summer_research/data-driven-policy/solr-4.8.1/example/exampledocs/sk.json");
		JSONArray jsonArray = JSONArray.fromObject(JsonContext);
		int size = jsonArray.size();
		System.out.println("Size: " + size);
		for(int  i = 0; i < size; i++){
			JSONObject jsonObject = jsonArray.getJSONObject(i);
			System.out.println("[" + i + "]name=" + jsonObject.get("name"));
			System.out.println("[" + i + "]package_name=" + jsonObject.get("package_name"));
			System.out.println("[" + i + "]check_version=" + jsonObject.get("check_version"));
		}
	}

}