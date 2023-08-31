<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Data Create</title>
</head>
<body>

    <div class="container mt-5">

        <?php include('../message.php'); ?>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">emkl Add
                    <a href="emkl_index.php" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="emkl_code.php" method="POST" class="form-inline">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Left Column -->
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td><label for="Order_No">Order No</label></td>
                                        <td><input type="text" id="Order_No" name="Order_No" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Container_Type">Container Type</label></td>
                                        <td>
                                            <select id="Container_Type" name="Container_Type" class="form-control" required>
                                                <option value=""></option>
                                                <option value="20 STD">20 STD</option>
                                                <option value="40 STD">40 STD</option>
                                                <option value="40 HQ">40 HQ</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="Container_No">Container No</label></td>
                                        <td><input type="text" id="Container_No" name="Container_No" class="form-control" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Seal_No">Seal No</label></td>
                                        <td><input type="text" id="Seal_No" name="Seal_No" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Gandeng_No">Gandeng No</label></td>
                                        <td><input type="text" id="Gandeng_No" name="Gandeng_No" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Forwarder_Code">Forwarder Code</label></td>
                                        <td><input type="text" id="Forwarder_Code" name="Forwarder_Code" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Forwarder_Name">Forwarder Name</label></td>
                                        <td><input type="text" id="Forwarder_Name" name="Forwarder_Name" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Forwarder_Cost">Forwarder Cost</label></td>
                                        <td><input type="text" id="Forwarder_Cost" name="Forwarder_Cost" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="LocationData">Location Data</label></td>
                                        <td><input type="text" id="LocationData" name="LocationData" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <!-- Right Column -->
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td><label for="Origin">Origin</label></td>
                                        <td><input type="text" id="Origin" name="Origin" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Destination">Destination</label></td>
                                        <td><input type="text" id="Destination" name="Destination" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Forwarding_Name">Forwarding Name</label></td>
                                        <td><input type="text" id="Forwarding_Name" name="Forwarding_Name" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Shipping_Company">Shipping Company</label></td>
                                        <td><input type="text" id="Shipping_Company" name="Shipping_Company" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Vessel">Vessel</label></td>
                                        <td><input type="text" id="Vessel" name="Vessel" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="V_No">V No</label></td>
                                        <td><input type="text" id="V_No" name="V_No" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Closing_Time">Closing Time</label></td>
                                        <td><input type="time" id="Closing_Time" name="Closing_Time" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Closing_Date">Closing Date</label></td>
                                        <td><input type="date" id="Closing_Date" name="Closing_Date" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="InPort_Date">InPort Date</label></td>
                                        <td><input type="text" id="InPort_Date" name="InPort_Date" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="AJU_No">AJU No</label></td>
                                        <td><input type="text" id="AJU_No" name="AJU_No" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Invoice_No">Invoice No</label></td>
                                        <td><input type="text" id="Invoice_No" name="Invoice_No" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="PEB_No">PEB No</label></td>
                                        <td><input type="text" id="PEB_No" name="PEB_No" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="PEB_Date">PEB Date</label></td>
                                        <td><input type="text" id="PEB_Date" name="PEB_Date" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Description">Description</label></td>
                                        <td><input type="text" id="Description" name="Description" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="save_emklData" class="btn btn-primary">Save Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
