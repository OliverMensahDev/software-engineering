<?php
public String getPersonalInfo2(Person person, int pin){

  if(!systemIsUp) return "System is down at the moment";

  if(person != null && person.getName().equals("")) return "Invalid Name";

  if(person.getPin() != pin) return "Invalid pin";

  return person.getPersonalInfo();
}