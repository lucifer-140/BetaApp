<?php
require '../DatabaseController/emkl_dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Data View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data View Details 
                            <a href="emkl_index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $emkl_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM emkl WHERE id='$emkl_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $emkl = mysqli_fetch_array($query_run);
                                ?>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Field</th>
                                            <th>Value</th>
                                        </tr>
                                        <tr>
                                            <td>Order_No</td>
                                            <td><?=$emkl['Order_No'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Container_Type</td>
                                            <td><?=$emkl['Container_Type'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Container_No</td>
                                            <td><?=$emkl['Container_No'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Seal_No</td>
                                            <td><?=$emkl['Seal_No'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Gandeng_No</td>
                                            <td><?=$emkl['Gandeng_No'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Forwarder_Code</td>
                                            <td><?=$emkl['Forwarder_Code'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Forwarder_Name</td>
                                            <td><?=$emkl['Forwarder_Name'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Forwarder_Cost</td>
                                            <td><?=$emkl['Forwarder_Cost'];?></td>
                                        </tr>
                                        <tr>
                                            <td>LocationData</td>
                                            <td><?=$emkl['LocationData'];?></td>
                                        </tr>
                                        <tr>
                                            <td>InFactory_Date</td>
                                            <td><?=$emkl['InFactory_Date'];?></td>
                                        </tr>
                                        <tr>
                                            <td>OutFactory_Date</td>
                                            <td><?=$emkl['OutFactory_Date'];?></td>
                                        </tr>
                                        <tr>
                                            <td>SP_No</td>
                                            <td><?=$emkl['SP_No'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Origin</td>
                                            <td><?=$emkl['Origin'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Destination</td>
                                            <td><?=$emkl['Destination'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Forwarding_Name</td>
                                            <td><?=$emkl['Forwarding_Name'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Shipping_Company</td>
                                            <td><?=$emkl['Shipping_Company'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Vessel</td>
                                            <td><?=$emkl['Vessel'];?></td>
                                        </tr>
                                        <tr>
                                            <td>V_No</td>
                                            <td><?=$emkl['V_No'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Closing_Date</td>
                                            <td><?=$emkl['Closing_Date'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Closing_Time</td>
                                            <td><?=$emkl['Closing_Time'];?></td>
                                        </tr>
                                        <tr>
                                            <td>InPort_Date</td>
                                            <td><?=$emkl['InPort_Date'];?></td>
                                        </tr>
                                        <tr>
                                            <td>AJU_No</td>
                                            <td><?=$emkl['AJU_No'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Invoice_No</td>
                                            <td><?=$emkl['Invoice_No'];?></td>
                                        </tr>
                                        <tr>
                                            <td>PEB_No</td>
                                            <td><?=$emkl['PEB_No'];?></td>
                                        </tr>
                                        <tr>
                                            <td>PEB_Date</td>
                                            <td><?=$emkl['PEB_Date'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Description</td>
                                            <td><?=$emkl['Description'];?></td>
                                        </tr>
                                    </table>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
