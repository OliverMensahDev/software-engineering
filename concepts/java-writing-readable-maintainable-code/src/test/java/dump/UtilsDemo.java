package dump;

import java.util.ArrayList;

public class UtilsDemo {

    public static void main(String[] args)  {

        if(new ArrayList().size() != 0){
            System.out.println("hola");
        }

        int count = CommonUtils.countOccurrences("aa", 'a');
        CommonUtils.printNowNewYorkTime();
        int n = CommonUtils.generateRandomNumberBetween(1,2);

    }
}
