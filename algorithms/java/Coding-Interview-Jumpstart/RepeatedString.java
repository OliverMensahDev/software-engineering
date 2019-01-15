class RepeatedString{
  public static void main(String[] args){
    System.out.println(repeatedString("ab",5));
  }
  
  static String repeatedString(String data, int length){
    int dataLen = data.length();
    if(dataLen == length) return data;
    if(length < dataLen) return null;
    
    char[] newData = new char[length];
    for(int i= 0; i < dataLen; i++){
      newData[i] = data.charAt(i);
    }
    int j = 0;
    for(int i=dataLen; i< length; i++){
      if(j>= dataLen) j = 0;
      newData[i] = data.charAt(j++); 
    }
    String res = "";
    for(char a : newData){
      if(a == 'a') res+=a;
    }
    return res;
  }  
}