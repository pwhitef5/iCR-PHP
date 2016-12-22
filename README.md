# iCR-PHP
PHP Class for managing F5 iControl REST

This includes both a class and a set of standalone functions
- icr_class.php - iCR class file
- iCR.php - iCR standalone functions
- iCR_class_example.txt - example of use of the class
- iCR_example.txt - example of the use of the standalone functions

Methods:
- get($url)
- create($url,$data)
- modify($url,$data)
- delete($url)

Class variables:
- username = "admin"
- password = "admin"
- hostname - IP or FQDN of device to connect to
- timeout = 5 secs
- code - the response HTTP Status code

Example:
```
<?php
include("iCR_class.php");
$r = new iCR ("172.24.9.129");

# Try to retrieve a non-existent virtual server
print_r($r->get("/ltm/virtual/iCR_Test_VS"));
echo $r->code;

# Create a new virtual server
$vs = array('name'=>"iCR_Test_VS",'destination'=>'192.168.1.1:80','mask'=>'255.255.255.255','ipProtocol'=>'tcp');
$r->create("/ltm/virtual",$vs);

# Modify a Virtual Server
$description = array('description' => 'This is a modified Virtual Server');
$r->modify("/ltm/virtual/iCR_Test_VS",$description);
echo "Modify HTTP Return Code: $r->code\n";

# Show the created and modified virtual server
print_r($r->get("/ltm/virtual/iCR_Test_VS"));

# Delete the virtual server created above
$r->delete("/ltm/virtual/iCR_Test_VS");
echo "Delete HTTP Return Code: $r->code\n";

# Show that virtual server has been deleted
$r->get("/ltm/virtual/iCR_Test_VS");
echo "Deleted VS Get HTTP Return Code: $r->code\n";

```
