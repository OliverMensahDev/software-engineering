<?php 
$skills = ["HTML", "CSS", "JavaScript", "PHP", "SQL"];
$list = "<ul>";
foreach($skills as $skill){
  $list .= "<li>$skill</li>";
}
$list .="</ul>";
echo $list;