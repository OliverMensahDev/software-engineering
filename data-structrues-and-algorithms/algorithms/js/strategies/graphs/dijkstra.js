class MemoTable {
    constructor(vertices) {
        this.S = { name: "S", cost: 0, visited: false }
        this.table = [this.S]
        for (let vertex of vertices) {
            this.table.push({ name: vertex, cost: Number.POSITIVE_INFINITY, visited: false })
        }
    }
    getCandidateVertices() {
        return this.table.filter(entry => {
            return entry.visited === false
        })
    }
    nextVertex() {
        const candidates = this.getCandidateVertices();
        if (candidates.length > 0) {
            return candidates.reduce((prev, curr) => {
                return prev.cost < curr.cost ? prev : curr;
            })
        } else {
            return null;
        }
    }
    getEntry(vertex) {
        return this.table.find(entry => entry.name == vertex);
    }
    setCurrentCost(vertex, cost) {
        this.getEntry(vertex).cost = cost;
    }
    getCost(vertex) {
        return this.getEntry(vertex).cost
    }
    setAsVisited(vertex) {
        this.getEntry(vertex).visited = true;
    }
    toString() {
        console.log(this.table);
    }
};

const vertices = ["A", "B", "C", "D", "E"];
const graph = [
    { from: "S", to: "A", cost: 4, fare: 5, time: 2 },
    { from: "S", to: "E", cost: 2 },
    { from: "A", to: "D", cost: 3 },
    { from: "A", to: "C", cost: 6 },
    { from: "A", to: "B", cost: 5 },
    { from: "B", to: "A", cost: 3 },
    { from: "C", to: "B", cost: 1 },
    { from: "D", to: "C", cost: 3 },
    { from: "D", to: "A", cost: 1 },
    { from: "E", to: "D", cost: 1 }
]
const memo = new MemoTable(vertices);
//console.log(memo.S);
const evaluate = vertex => {
    //memo.table[]
    const edges = graph.filter(path => {
        return path.from === vertex.name
    })
    console.log(edges);
    for (edge of edges) {
        const currentVertexCost = memo.getCost(edge.from);


        const toVertexCost = memo.getCost(edge.to);

        const tentativeCost = currentVertexCost + edge.cost;
        if (tentativeCost < toVertexCost) {
            memo.setCurrentCost(edge.to, tentativeCost)
        }
    }
    memo.setAsVisited(vertex.name);
    const next = memo.nextVertex();
    if (next) evaluate(next)
}
//kick of from source 
evaluate(memo.S)
//memo.toString();