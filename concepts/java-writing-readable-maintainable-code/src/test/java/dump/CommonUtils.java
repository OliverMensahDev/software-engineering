package dump;

import java.time.Instant;
import java.time.ZoneId;
import java.util.Random;

public class CommonUtils {


    public static int countOccurrences(String stringToSearch, char charToFind){
        int count = 0;
        for (int i=0; i < stringToSearch.length(); i++){
            if (stringToSearch.charAt(i) == charToFind){
                count++;
            }
        }
        return count;
    }

    public static void printNowNewYorkTime(){
        String now = Instant.now().atZone(ZoneId.of("America/New_York")).toString();
        System.out.println(now);
    }

    public static int generateRandomNumberBetween(int low, int high){
        return new Random().nextInt(high-low) + low;
    }
}
