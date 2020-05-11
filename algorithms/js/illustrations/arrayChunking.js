function chunkArray(arr, len){
    
    const dataStore = []
    // set index
    let i = 0;
    while( i < arr.length){
        dataStore.push(arr.slice(i,  i += len));
    }
    return dataStore;
}

let students = ["Oliver Mensah", "Peter Annan", "Esi Ansah"]
console.log(chunkArray(students, 2))