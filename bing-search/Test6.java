import java.io.BufferedInputStream;  
import java.io.DataOutputStream;  
import java.io.InputStream;  
import java.io.InputStreamReader;  
import java.io.Reader;  
import java.net.HttpURLConnection;  
import java.net.URL;  
import java.net.URLEncoder;  
  
public class Test6 {  
    public static String cc(String leibie, String num) {  
        StringBuffer temp = new StringBuffer();  
        try {  
            System.out.println(leibie);  
            System.out.println(num);  
            String url = "http://www.baidu.com/jiaojing/ser.php";  
            HttpURLConnection uc = (HttpURLConnection)new URL(url).  
                                   openConnection();  
            uc.setConnectTimeout(10000);  
            uc.setDoOutput(true);  
            uc.setRequestMethod("GET");  
            uc.setUseCaches(false);  
            DataOutputStream out = new DataOutputStream(uc.getOutputStream());  
  
            // 要传的参数  
            String s = URLEncoder.encode("ra", "GB2312") + "=" +  
                       URLEncoder.encode(leibie, "GB2312");  
            s += "&" + URLEncoder.encode("keyword", "GB2312") + "=" +  
                    URLEncoder.encode(num, "GB2312");  
          
            out.writeBytes(s);  
            out.flush();  
            out.close();  
            InputStream in = new BufferedInputStream(uc.getInputStream());  
            Reader rd = new InputStreamReader(in, "Gb2312");  
            int c = 0;  
            while ((c = rd.read()) != -1) {  
                temp.append((char) c);  
            }  
            System.out.println(temp.toString());  
            in.close();  
  
        } catch (Exception e) {  
            e.printStackTrace();  
        }  
        return temp.toString();  
    }  
  
public static void main(String[] a){  
        Test6.cc("1","吉H");  
    }  
  
} 