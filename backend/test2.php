<?php
require "memberCRUD.php";
require "memberContactCRUD.php";
require "serviceCRUD.php";


echo "Try query all member: <br>";
queryMembers();
echo "<br>";
echo "<br>";
echo "Try query one member (id 1): <br>";
queryOneMember(); //need param
echo "<br>";
echo "<br>";
echo "Try query member contact <br>";
queryMemberContact(); // need param
//createMember();
//updateMember();
echo "<br>";
echo "<br>";
echo "Try query service <br>";
queryService();
//createMemberContact();

?>