class Palindrom{
  public static void main(String[] args){
    System.out.println(palindrome("fg"));
  }
  
  static boolean isPalindrom(String data){
    if(data == "") return false;
    if(data.length() == 1) return true;
    char[] charArray = data.toCharArray();
    if(data.length() == 2 && charArray[0] == charArray[charArray.length -1])return true;
    if(charArray[0] == charArray[charArray.length -1]){
      String res = removeFirstAndLast(charArray);
      return isPalindrom(res);
    }else 
      return false;
  }
  
  static String removeFirstAndLast(char[] data){
    String res = "";
    for(int i = 1; i<= data.length -2 ; i++){
      res += String.valueOf(data[i]);
    }
    return res;  
  }
  
  static boolean palindrome(String s){
    int start = 0;
    int end = s.length() - 1;
    int mid = (start + end) / 2;
    
    for(int index = start; index <= mid; index++){
      if(s.charAt(start) == s.charAt(end)){
        index++;
        end--;
      }else{
        return false;
      }
    }
     return true; 
  }
}