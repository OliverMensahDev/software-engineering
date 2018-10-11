function removeDuplicatesA(data){
    //Sorting array to bring duplicates together 
    data = data.slice(0).sort((a,b) =>  b < a);
    let result = [];
    let prev = data[0];
    result[0] = prev;
    for(let i = 1;  i< data.length; i++){
        let current = data[i];
        if(current != prev){
            result.push(current);
        };
        prev = current;
    }
    return result;    
}


function removeDuplicatesB(data){
    data = data.slice(0).sort((a,b)=> b < a);
    return  data.reduce((acc, cur)=> {
        if(!acc.includes(cur)) acc.push(cur);
        return acc;
    }, []);
}

let data = [2, 3, 4, 2, 5, 2];
console.log(removeDuplicatesB(data));

