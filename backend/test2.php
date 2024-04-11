<?php
require "memberCRUD.php";
require "memberContactCRUD.php";

echo "Try query all member: <br>";
queryMembers();
echo "<br>";
echo "<br>";
echo "Try query one member (id 1): <br>";
queryOneMember();

//createMember();
//updateMember();

?>