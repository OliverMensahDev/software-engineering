function Graph(v) {
    this.vertices = v;
    this.edges = 0;
    this.adj = [];
    for (var i = 0; i < this.vertices; ++i) {
        this.adj[i] = [];
        this.adj[i].push("");
    }
    this.addEdge = addEdge;
    this.showGraph = showGraph;
    this.bfs = bfs;
    this.marked = [];
    for (var i = 0; i < this.vertices; ++i) {
        this.marked[i] = false;
    }
}

function addEdge(v,w) {
    this.adj[v].push(w);
    this.adj[w].push(v);
    this.edges++;
}

function showGraph() {
    for (var i = 0; i < this.vertices; ++i) {
        console.log(i + " -> ");
        for (var j = 0; j< this.vertices; ++j) { 
            if (this.adj[i][j] != undefined) 
                console.log(this.adj[i][j] + ' ');      
        }
        console.log();   
    } 
}

function bfs(s) {
    var queue = []; 
    this.marked[s] = true; 
    queue.push(s); // add to back of queue
    while (queue.length > 0) { 
        var v = queue.shift(); // remove from front of queue    
        if (v != undefined) { 
            console.log("Visited vertex: " + v);
        }
       /* foreach (var w in this.adj[v]) { 
            if (!this.marked[w]) {
                this.edgeTo[w] = v;
                this.marked[w] = true;
                queue.push(w);
            }  
        } */
    }
}



g = new Graph(5);
g.addEdge(0,1);
g.addEdge(0,2);
g.addEdge(1,3);
g.addEdge(2,4);
g.showGraph();
g.bfs(0);
g.bfs(2);
g.bfs(1);
g.bfs(3);
g.bfs(4);