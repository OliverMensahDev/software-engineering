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


function createPriorityQueue(){
    const lowPriorityQueue = createQueue()
    const highPriorityQueue = createQueue();

    return{
          // add or enqueue
          enqueue(item, isHighPriority = false) {
            isHighPriority 
            ? highPriorityQueue.enqueue(item)
            : lowPriorityQueue.enqueue(item)
        }, 

        // remove or dequeue
        dequeue(){
            //remove final item 
            if(!highPriorityQueue.isEmpty()){
                return highPriorityQueue.dequeue()
            }
            return lowPriorityQueue.dequeue();
        },

        // peek = what's next to be removed
        peek(){
            //remove final item 
            if(!highPriorityQueue.isEmpty()){
                return highPriorityQueue.peek()
            }
            return lowPriorityQueue.peek();
        },

        // length property 
        get length() {
            //getter approach
            return highPriorityQueue.length + lowPriorityQueue.length
        },    

        // isEmpty
        isEmpty(){
            //conjuction of the two arrays
            return highPriorityQueue.isEmpty() && lowPriorityQueue.isEmpty()
        }
    }
}


const q = createPriorityQueue();
q.enqueue("A fix here");
q.enqueue("A bug there");
q.enqueue("A new feature");

q.dequeue()
q.enqueue("Emergency task", true)

console.log(q.peek())
console.log(q.length);

