class Set{
    constructor(){
        this.dataStore = [];
    }
    add(data){
        if(this.dataStore.indexOf(data)<0){
            this.dataStore.push(data);
            return true;
        }
        else{
            return false;
        }
    }

    remove(data){
        var pos = this.dataStore.indexOf(data);
        if(pos>-1){
            this.dataStore.splice(pos,1);
            return true;
        }
        else {
            return false;
        }
    }

    show(set){
        return this.dataStore;
    }

    size(){
        return this.dataStore.length;
    }

    contains(data){
        if(this.dataStore.indexOf(data)>-1){
            return true;
        }
        else{
            return false;
        }
    }

    union(set){
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

    intersect(set){
        var tempset = new Set();
        for(var i=0; i<this.dataStore.length; ++i){
            if(set.contains(this.dataStore[i])){
                tempset.add(this.dataStore[i]);
            }
        }
        return tempset;
    }

    difference(set){
        var tempset = new Set();
        for(var i=0; i<this.dataStore.length; ++i){
            if(!set.contains(this.dataStore[i])){
                tempset.add(this.dataStore[i]);
            }
        }

        return tempset;
    }
}

// Union Result
let cis = new Set();
cis.add("Mike");
cis.add("Clayton");
cis.add("Jennifer");
cis.add("Raymond");

let dmp = new Set();
dmp.add("Raymond");
dmp.add("Cynthia");
dmp.add("Jonathan");

let it = new Set();
it = cis.union(dmp);
console.log(it.show());

let inter = cis.intersect(dmp);
console.log(inter.show());

// Difference of two sets

cis = new Set();
it = new Set();
cis.add("Clayton");
cis.add("Jennifer");
cis.add("Danny");

it.add("Bryan");
it.add("Clayton");
it.add("Jennifer");

let diff = new Set();
let intersect1 = new Set();
intersect1 = cis.intersect(it);
console.log(intersect1.show());
diff = cis.difference(it);
console.log(diff.show());