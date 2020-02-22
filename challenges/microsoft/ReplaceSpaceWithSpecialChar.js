function replace(data) {
  //get  data as character array
  let charArray = data.split("");
  //get exact content of text
  let content = data.trim();
  //get total Index
  let totalIndex = content.length - 1;
  //total index for new String including characters
  let pointer = totalIndex;
  //loop through and increment the total index of new String by 2 if there is empty space
  for (let i = 0; i < totalIndex; i++) {
    if (content.charAt(i) == " ") pointer += 2;
  }
  //loop through the content from the end while shifting each item
  for (let i = totalIndex; i >= 0; i--) {
    if (charArray[i] != " ") charArray[pointer--] = content.charAt(i);
    else {
      charArray[pointer--] = "0";
      charArray[pointer--] = "2";
      charArray[pointer--] = "%";
    }
  }
  return charArray.join('');
}

let data = "we are about to go";
console.log(replace(data));
