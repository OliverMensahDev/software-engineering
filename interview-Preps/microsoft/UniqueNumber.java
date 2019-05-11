import java.util.HashMap;
class UniqueNumber{
    public static void main(String[] args){
        int[] data = {1,2,3,4,5,5,4,2,3, 1, 9};
        System.out.println(uniqueNumber(data));
    }

    public static int uniqueNumber(int[] data){
        HashMap<Integer, Integer> map = new HashMap<>();
        for(int i = 0; i < data.length ; i++f){
            int currentNumber = data[i];
            int occurrence = 0;
            if(map.keySet().contains(currentNumber)) occurrence = map.get(currentNumber);
            occurrence += 1;
            map.put(currentNumber, occurrence);
        }
         for(int i = 0; i < data.length ; i++){
            int currentNumber = data[i];
            if(map.get(currentNumber) == 1) return currentNumber;
         }
        return -1;
    }
}