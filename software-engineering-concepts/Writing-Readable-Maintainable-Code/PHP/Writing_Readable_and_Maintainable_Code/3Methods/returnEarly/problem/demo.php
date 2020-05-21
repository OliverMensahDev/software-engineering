<?php

public function getPersonalInfo(Person person, int pin){
  if (systemIsUp){
      if (person != null && person.getName().equals("")){
          if(person.getPin() != pin){
              return  "Invalid pin";
          }
          return "Invalid Name";
      }
      return "System is down at the moment";
  }
  return person.getPersonalInfo();
}

