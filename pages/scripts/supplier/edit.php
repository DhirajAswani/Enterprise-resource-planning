<?php

require_once("../../includes/functions.php");
require_once("../../includes/status-constants.php");
session_start();

if(isset($_POST['edit_supplier'])){
    
    $supplier_id = $_POST['supplier_id'];
    $supplier_name = $_POST['supplier_name'];
    $supplier_address = $_POST['supplier_address'];
    $supplier_email = $_POST['supplier_email'];
    $supplier_contact = $_POST['supplier_contact'];
    $gst_no = $_POST['gst_no'];
    
    $employee_id = $_SESSION['employee_id'];
    
    $query = " update supplier set supplier_name = '$supplier_name' , supplier_address = '$supplier_address' , supplier_email = '$supplier_email', supplier_contact = '$supplier_contact' , gst_no = '$gst_no', updated_by = $employee_id , updated_at = now() where supplier_id = $supplier_id ";
    
    $result = mysqli_query($connection,$query);
    checkQueryResult($result);
    
    
    $_SESSION['status'] = SUPPLIER_EDIT_SUCCESS;
    header("Location:http://".BASE_SERVER."/erp/pages/manage-supplier.php");
    exit();
}

?>