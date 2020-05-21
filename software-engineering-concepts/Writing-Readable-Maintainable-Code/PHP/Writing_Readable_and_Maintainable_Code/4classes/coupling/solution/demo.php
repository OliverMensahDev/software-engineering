<?php 

    // Programming to an Interface
    List<String> list2 = new ArrayList<>();


    void doSomething2(List<String> list){
        String firstElem = list.get(0);

        // do something with firstElem
    }

    void doSomethingElse2(List<String> list){
        String lastElem = list.get(list.size() - 1);

        // do something with lastElem
    }