const saltWaterFish = ["Asp", "Carp", "Ide",  "Trout"];
const freshWaterFish = ["Cod", "Herring", "Marlin"];

function createFishListInAlphabeticalOrder(){
  let newList = [];
  while(saltWaterFish.length !=0 && freshWaterFish.length !=0){
    if(saltWaterFish[0] < freshWaterFish[0]){
      fish = saltWaterFish.shift();
    }else{      
      fish = freshWaterFish.shift();
    }
    newList.push(fish)
  }
  if(freshWaterFish.length != 0){
    newList = [...newList, ...freshWaterFish]
  }

  if(saltWaterFish.length != 0){
    newList = [...newList, ...saltWaterFish]
  }
  return newList;
}

console.log(createFishListInAlphabeticalOrder())