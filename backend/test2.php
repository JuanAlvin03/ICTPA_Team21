<?php
include_once "memberCRUD.php";
include_once "memberContactCRUD.php";
include_once "serviceCRUD.php";


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
/*
echo "<br>";
echo "<br>";
echo "Try member search: <br>";
searchMembers("sam");
*/

?>