import java.util.Arrays;
class Anagram{
  //subject and anagram are the same 
  public static void main(String[] args){
    String s1 = "good", s2="doag";
    System.out.println(solve(s1.toCharArray(), s2.toCharArray()));
  }
  
  static boolean solve(char[] s1, char[] s2){
    Arrays.sort(s1);
    Arrays.sort(s2);
    
    for(int i =0; i<s1.length; i++){
      if(s1[i] != s2[i]) 
      return false;
    }
    
    return true;
  }
}