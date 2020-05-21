package m3naming;

import org.apache.http.HttpResponse;

import java.io.IOException;

public class ClientDemo {

    public static void main(String[] args) throws IOException {

        HttpResponse response = new WebHttpClient().sendGet("https://api.github.com/");


    }
}
