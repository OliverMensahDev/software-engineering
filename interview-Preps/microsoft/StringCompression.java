class StringCompression{
    public static void main(String[] args){
        String data ="abbcccccda";
        System.out.println(compress(data));
    }

    public static String compress(String data){
        int counter = 1;
        String result = "";
        int startIndex = 0, nextIndex = 1;
        for(; nextIndex < data.length(); nextIndex++){
            if(data.charAt(startIndex) == data.charAt(nextIndex)) counter++;
            else{
                result += data.charAt(startIndex)+String.valueOf(counter);
                startIndex = nextIndex;
                counter = 1;
            }
        }
        result +=  data.charAt(startIndex)+String.valueOf(counter);
        return result;

    }
}