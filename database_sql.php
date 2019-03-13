<?php


$connect = "CN=moabadmin, OU=BenuzterAdmin, OU=99 EDV, DC=regenbogen, DC=ag";


$sql_query= "SELECT memberOf, Enabled FROM " . $connect ;

$sql_query = "SELECT memberOf,title,userPrincipalName,mail,whenCreated,department,employeeType FROM ". $connect;
