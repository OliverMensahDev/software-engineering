function chunkArray(arr, len){
    
    const dataStore = {}
    // set index
    let i = 0;
    while( i< arr.length){
        dataStore[i] = arr.slice(i,  i+ len);
        i += len;
    }
    return dataStore;
}

let students = ["Oliver Mensah", "Peter Annan", "Esi Ansah"]
console.log(chunkArray(students, 2))