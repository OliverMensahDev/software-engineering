<?php 
class CouplingExample1 {

    // Not programming to an Interface
    ArrayList<String> list = new ArrayList<>();


    void doSomething(ArrayList<String> list){
        String firstElem = list.get(0);

        // do something with firstElem
    }

    void doSomethingElse(ArrayList<String> list){
        String lastElem = list.get(list.size() - 1);

        // do something with lastElem
    }
}