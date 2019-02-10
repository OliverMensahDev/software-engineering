class ReplaceSpaceWithSpecialChar{
    public static void main(String[] args){
        String data = "we are about to go                ";
        System.out.println(replace(data));
    }

    public static String replace(String data){
        //get  data as character array
        char[] charArray = data.toCharArray();
        //get exact content of text 
        String content = data.trim();
        //get total Index
        int totalIndex = content.length() - 1;
        //total index for new String including characters
        int pointer = totalIndex;
        //loop through and increment the total index of new String by 2 if there is empty space
        for(int i =0; i< totalIndex ; i++){
            if(content.charAt(i) == ' ') pointer +=2;
        }
        //loop through the content from the end while shifting each item 
        for(int i = totalIndex; i>=0; i--){
            if(charArray[i] != ' ') charArray[pointer--] = content.charAt(i);
            else {
                charArray[pointer--] = '0';
                charArray[pointer--] = '2';
                charArray[pointer--] = '%';
            }
        }       
       return new String(charArray);

    }
}