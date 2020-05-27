function Set(){
    this.dataStore = [];
    this.add = add;
    this.remove= remove;
    this.size = size;
    this.contains = contains;
    this.union = union;
    this.intersect = intersect;
    this.difference = difference;
    this.show = show;
}

function add(data){
    if(this.dataStore.indexOf(data)<0){
        this.dataStore.push(data);
        return true;
    }
    else{
        return false;
    }
}

function remove(data){
    var pos = this.dataStore.indexOf(data);
    if(pos>-1){
        this.dataStore.splice(pos,1);
        return true;
    }
    else {
        return false;
    }
}

function show(set){
    return this.dataStore;
}

function size(){
    return this.dataStore.length;
}

function contains(data){
    if(this.dataStore.indexOf(data)>-1){
        return true;
    }
    else{
        return false;
    }
}

function union(set){
    var tempset = new Set();
    for(var i=0; i<this.dataStore.length;++i){
        tempset.add(this.dataStore[i]);
    }

    for(var i=0;i<set.dataStore.length;++i){
        if(!tempset.contains(set.dataStore[i])){
            tempset.dataStore.push(set.dataStore[i]);
        }
    }

    return tempset;
}

function intersect(set){
    var tempset = new Set();
    for(var i=0; i<this.dataStore.length; ++i){
        if(set.contains(this.dataStore[i])){
            tempset.add(this.dataStore[i]);
        }
    }
    return tempset;
}

function difference(set){
    var tempset = new Set();
    for(var i=0; i<this.dataStore.length; ++i){
        if(!set.contains(this.dataStore[i])){
            tempset.add(this.dataStore[i]);
        }
    }

    return tempset;
}

// Union Result

var cis = new Set();
cis.add("Mike");
cis.add("Clayton");
cis.add("Jennifer");
cis.add("Raymond");

var dmp = new Set();
dmp.add("Raymond");
dmp.add("Cynthia");
dmp.add("Jonathan");

var it = new Set();
it = cis.union(dmp);
console.log(it.show());

var inter = cis.intersect(dmp);
console.log(inter.show());

// Difference of two sets

var cis = new Set();
var it = new Set();
cis.add("Clayton");
cis.add("Jennifer");
cis.add("Danny");

it.add("Bryan");
it.add("Clayton");
it.add("Jennifer");

var diff = new Set();
var intersect1 = new Set();
intersect1 = cis.intersect(it);
console.log(intersect1.show());
diff = cis.difference(it);
console.log(diff.show());