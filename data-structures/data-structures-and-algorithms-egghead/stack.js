function createStack(){
    const queue = []
    return {
        //push
        push(item){
            queue.push(item)
        },

        //pop
        pop(){
            return queue.pop()
        },

        //peek
        peek(){
            return queue[queue.length - 1]
        },
        //length

        get length(){
            return queue.length
        },


        //isEmpty
        isEmpty(){
            return queue.length == 0
        }
    }
}

const lowerBody = createStack()
lowerBody.push("underwear")
lowerBody.push("socks")
lowerBody.push("pants")
lowerBody.push("shoes")

console.log(lowerBody.pop());
