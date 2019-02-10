function randomInt(min, max) {
    return Math.random() * (max - min) + min;
}

function shuffle(array){
    array = array.slice();
  
    for (let i = 0; i < array.length; i++) {
      const randomChoiceIndex = randomInt(i, array.length);
      [array[i], array[randomChoiceIndex]] = [array[randomChoiceIndex], array[i]];
    }
  
    return array;
  }

  const orig = new Array(10).fill('').map((x, i) => i);
  console.log(shuffle(orig))
  
