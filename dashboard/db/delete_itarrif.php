<?php
include_once("Crud.php");

$crud = new Crud();

//getting id of the data from url
$id = $crud->my_simple_crypt($_GET['id'],'d');

//deleting the row from table
//$result = $crud->execute("DELETE FROM users WHERE id=$id");
$result = $crud->delete($id, 'insurance_tarrif');
if($result){
	print "<script>";
			print "alert('Successfully Deleted ');";
			print "self.location='../pages/insurancetarriflist.php';";
			print "</script>";
}
?>