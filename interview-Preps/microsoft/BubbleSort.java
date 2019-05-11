class BubbleSort{
    public static void main(String[] args){
        int[] data = {-1, -4, 0,4, 3, 5};
        sort(data);
        print(data);
    }

    public static int[] sort(int[] data){
        boolean doItAgain = false;
        int limit = data.length;
        int nextDefaultValue = Integer.MAX_VALUE;
        for(int i = 0; i < limit; i++){
            int currentValue = data[i];
            int nextValue = i + 1 < limit ? data[i + 1]: nextDefaultValue;
            if(nextValue < currentValue){
                data[i] = nextValue ;
                data[i + 1] = currentValue;
                doItAgain = true;
            }
        }
        if(doItAgain) sort(data);
        return data;
    }

    static void  print(int[] data){
        System.out.print("[");
        for(int i =0; i < data.length; i++){
            System.out.print(data[i]);
            if(i < data.length - 1)
                System.out.print(",");
        }
        System.out.print("]");

    }
}