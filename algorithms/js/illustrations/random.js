/**
 * REturns a random int between
 * @param  start inclusive
 * @param  end exclusive
 */
function random(start, end){
    if(end < start){throw new Error("End must be greater than start")}
    return  start + Math.floor(Math.random() * (end - start))
}

for( let i = 0; i < 2; i++){
    try {
        console.log(random(90, 78))
    } catch (error) {
        console.log(error.message)
    }
    
}