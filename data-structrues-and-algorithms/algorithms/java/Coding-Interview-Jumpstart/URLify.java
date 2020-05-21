public class URLify{
  public static void main(String[] args){
    String  data = "We are here now                ";
    char[] stringToCharArray = data.toCharArray();
    char[] result = URLify.get(stringToCharArray, data.trim().length() - 1);
    
    String res = URLify.getData("aabcccccaaa");
    System.out.println(res);
  }
  
  public static char[] get(char[] s, int len){
    int  p = len;
    for(int i = 0; i< len; i++){
      if(s[i] == ' ') p +=2;
    }
    
    for (int j = len; j >=0; j--){
      if(s[j] != ' '){
        s[p--] = s[j];
      }
     else{
       s[p--] = '0';
       s[p--] = '2';
       s[p--] = '%';
     }
    }
    return s;
  }
  
  public static String getData(String data){
    String result = "";
    int counter = 1;
    int i =0, j= 1;
    for(; j <data.length(); j++){
      if(data.charAt(i) == data.charAt(j)){
        counter++;
      }
      else{
        result += data.charAt(i)+ String.valueOf(counter) ;
        i  = j;
        counter = 1;
      }
    }
    result += data.charAt(i)+ String.valueOf(counter) ;
    return result;
  }
  
}
