
function  createQueue(){
    //array held in closure
    const queue = []

    return {
        // add or enqueue
        enqueue(item) {
            // add to front of array 
            queue.unshift(item);
        }, 

        // remove or dequeue
        dequeue(){
            //remove final item 
            return queue.pop()
        },

        // peek = what's next to be removed
        peek(){
        return queue[queue.length -1]
        },

        // length property 
        get length() {
            //getter approach
            return queue.length
        },    

        // isEmpty
        isEmpty(){
            return queue.length === 0;
        }
    }
}

const q = createQueue()
q.enqueue("Make an egghead lesson")
q.enqueue("Help others learn")
q.enqueue("Be Happy");
console.log(q.dequeue())
console.log(q.peek())