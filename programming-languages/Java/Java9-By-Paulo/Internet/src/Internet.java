import jdk.incubator.http.HttpClient;
import jdk.incubator.http.HttpRequest;
import jdk.incubator.http.HttpResponse;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.*;

public class Internet {

    public static void main(String[] args) throws IOException {
        newWay();
    }

    public static void newWay() {
        HttpClient  httpClient = HttpClient.newHttpClient();
        try {
            HttpRequest httpRequest = HttpRequest.newBuilder().uri(new URI("https://medium.com/carbon-five/webrtc-made-simple-3bdbb1d8af8b")).GET().build();
            HttpResponse<String> httpResponse = httpClient.send(httpRequest, HttpResponse.BodyHandler.asString());
            System.out.println(httpResponse.body());
        } catch (URISyntaxException e) {
            e.printStackTrace();
        } catch (InterruptedException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }

    }

    public static void oldWay() throws IOException {
        URL url;
        BufferedReader reader = null;
        try {
            // specify url
            url = new URL("https://medium.com/carbon-five/webrtc-made-simple-3bdbb1d8af8b");
            //open connection
            try {
                URLConnection urlConnection = url.openConnection();
                reader = new BufferedReader(new InputStreamReader(urlConnection.getInputStream()));

            } catch (IOException e) {
                System.out.println(e.getMessage());
            }

        } catch (MalformedURLException e) {
            System.out.println(e.getMessage());
        }
        String string;


        while((string = reader.readLine()) != null){
            System.out.println(string);

        }
        reader.close();

    }

}
