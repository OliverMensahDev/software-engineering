<?php 
$john = new Person("Mr.", "John", "Smith");
//or 
 $john = new Person.Builder()
               .title("Mr.")
               .name("John")
               .surname("Smith")
               .build();
$greeting = new EmailSender().constructTemplateEmail(john);

