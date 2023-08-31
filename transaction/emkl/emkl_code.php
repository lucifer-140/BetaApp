<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require '../../DatabaseController/emkl_dbcon.php';

if (isset($_POST['delete_emklData'])) {
    $emkl_id = mysqli_real_escape_string($con, $_POST['delete_emklData']);

    $query = "DELETE FROM emkl WHERE id='$emkl_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Data Deleted Successfully";
        header("Location: emkl_index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Data Not Deleted";
        header("Location: emkl_index.php");
        exit(0);
    }
}

if (isset($_POST['update_emklData'])) {
    $emkl_id = mysqli_real_escape_string($con, $_POST['emkl_id']);

    $Order_No = mysqli_real_escape_string($con, $_POST['Order_No']);
    $Container_Type = mysqli_real_escape_string($con, $_POST['Container_Type']);
    $Container_No = mysqli_real_escape_string($con, $_POST['Container_No']);
    $Seal_No = mysqli_real_escape_string($con, $_POST['Seal_No']);
    $Forwarder_Code = mysqli_real_escape_string($con, $_POST['Forwarder_Code']);
    $Forwarder_Name = mysqli_real_escape_string($con, $_POST['Forwarder_Name']);
    $Forwarder_Cost = mysqli_real_escape_string($con, $_POST['Forwarder_Cost']);
    $Description = mysqli_real_escape_string($con, $_POST['Description']);
    $Location = mysqli_real_escape_string($con, $_POST['Location']);
    $InFactory_Date = mysqli_real_escape_string($con, $_POST['InFactory_Date']);
    $OutFactory_Date = mysqli_real_escape_string($con, $_POST['OutFactory_Date']);
    $SP_No = mysqli_real_escape_string($con, $_POST['SP_No']);
    $Gandeng_No = mysqli_real_escape_string($con, $_POST['Gandeng_No']);
    $Origin = mysqli_real_escape_string($con, $_POST['Origin']);
    $Destination = mysqli_real_escape_string($con, $_POST['Destination']);
    $Forwarding_Name = mysqli_real_escape_string($con, $_POST['Forwarding_Name']);
    $Shipping_Company = mysqli_real_escape_string($con, $_POST['Shipping_Company']);
    $Vessel = mysqli_real_escape_string($con, $_POST['Vessel']);
    $V_No = mysqli_real_escape_string($con, $_POST['V_No']);
    $Closing_Date = mysqli_real_escape_string($con, $_POST['Closing_Date']);
    $Closing_Time = mysqli_real_escape_string($con, $_POST['Closing_Time']);
    $InPort_Date = mysqli_real_escape_string($con, $_POST['InPort_Date']);
    $AJU_No = mysqli_real_escape_string($con, $_POST['AJU_No']);
    $Invoice_No = mysqli_real_escape_string($con, $_POST['Invoice_No']);
    $PEB_No = mysqli_real_escape_string($con, $_POST['PEB_No']);
    $PEB_Date = mysqli_real_escape_string($con, $_POST['PEB_Date']);

    $query = "UPDATE emkl SET 
        Order_No='$Order_No', 
        Container_Type='$Container_Type', 
        Container_No='$Container_No', 
        Seal_No='$Seal_No', 
        Forwarder_Code='$Forwarder_Code', 
        Forwarder_Name='$Forwarder_Name', 
        Forwarder_Cost='$Forwarder_Cost', 
        Description='$Description', 
        Location='$Location', 
        InFactory_Date='$InFactory_Date', 
        OutFactory_Date='$OutFactory_Date', 
        SP_No='$SP_No',
        Gandeng_No='$Gandeng_No',
        Origin='$Origin',
        Destination='$Destination',
        Forwarding_Name='$Forwarding_Name',
        Shipping_Company='$Shipping_Company',
        Vessel='$Vessel',
        V_No='$V_No',
        Closing_Date='$Closing_Date',
        Closing_Time='$Closing_Time',
        InPort_Date='$InPort_Date',
        AJU_No='$AJU_No',
        Invoice_No='$Invoice_No',
        PEB_No='$PEB_No',
        PEB_Date='$PEB_Date'
        WHERE id='$emkl_id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Data Updated Successfully";
        header("Location: emkl_index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Data Not Updated";
        header("Location: emkl_index.php");
        exit(0);
    }
}

if (isset($_POST['save_emklData'])) {
    $Order_No = mysqli_real_escape_string($con, $_POST['Order_No']);
    $Container_Type = mysqli_real_escape_string($con, $_POST['Container_Type']);
    $Container_No = mysqli_real_escape_string($con, $_POST['Container_No']);
    $Seal_No = mysqli_real_escape_string($con, $_POST['Seal_No']);
    $Forwarder_Code = mysqli_real_escape_string($con, $_POST['Forwarder_Code']);
    $Forwarder_Name = mysqli_real_escape_string($con, $_POST['Forwarder_Name']);
    $Forwarder_Cost = mysqli_real_escape_string($con, $_POST['Forwarder_Cost']);
    $Description = mysqli_real_escape_string($con, $_POST['Description']);
    $Location = mysqli_real_escape_string($con, $_POST['Location']);
    $InFactory_Date = mysqli_real_escape_string($con, $_POST['InFactory_Date']);
    $OutFactory_Date = mysqli_real_escape_string($con, $_POST['OutFactory_Date']);
    $SP_No = mysqli_real_escape_string($con, $_POST['SP_No']);
    $Gandeng_No = mysqli_real_escape_string($con, $_POST['Gandeng_No']);
    $Origin = mysqli_real_escape_string($con, $_POST['Origin']);
    $Destination = mysqli_real_escape_string($con, $_POST['Destination']);
    $Forwarding_Name = mysqli_real_escape_string($con, $_POST['Forwarding_Name']);
    $Shipping_Company = mysqli_real_escape_string($con, $_POST['Shipping_Company']);
    $Vessel = mysqli_real_escape_string($con, $_POST['Vessel']);
    $V_No = mysqli_real_escape_string($con, $_POST['V_No']);
    $Closing_Date = mysqli_real_escape_string($con, $_POST['Closing_Date']);
    $Closing_Time = mysqli_real_escape_string($con, $_POST['Closing_Time']);
    $InPort_Date = mysqli_real_escape_string($con, $_POST['InPort_Date']);
    $AJU_No = mysqli_real_escape_string($con, $_POST['AJU_No']);
    $Invoice_No = mysqli_real_escape_string($con, $_POST['Invoice_No']);
    $PEB_No = mysqli_real_escape_string($con, $_POST['PEB_No']);
    $PEB_Date = mysqli_real_escape_string($con, $_POST['PEB_Date']);

    $query = "INSERT INTO emkl (
        Order_No,
        Container_Type,
        Container_No,
        Seal_No,
        Forwarder_Code,
        Forwarder_Name,
        Forwarder_Cost,
        Description,
        Location,
        InFactory_Date,
        OutFactory_Date,
        SP_No,
        Gandeng_No,
        Origin,
        Destination,
        Forwarding_Name,
        Shipping_Company,
        Vessel,
        V_No,
        Closing_Date,
        Closing_Time,
        InPort_Date,
        AJU_No,
        Invoice_No,
        PEB_No,
        PEB_Date
    ) VALUES (
        '$Order_No',
        '$Container_Type',
        '$Container_No',
        '$Seal_No',
        '$Forwarder_Code',
        '$Forwarder_Name',
        '$Forwarder_Cost',
        '$Description',
        '$Location',
        '$InFactory_Date',
        '$OutFactory_Date',
        '$SP_No',
        '$Gandeng_No',
        '$Origin',
        '$Destination',
        '$Forwarding_Name',
        '$Shipping_Company',
        '$Vessel',
        '$V_No',
        '$Closing_Date',
        '$Closing_Time',
        '$InPort_Date',
        '$AJU_No',
        '$Invoice_No',
        '$PEB_No',
        '$PEB_Date'
    )";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Data Added Successfully";
        header("Location: emkl_index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Data Not Added";
        header("Location: emkl_index.php");
        exit(0);
    }
}

?>

