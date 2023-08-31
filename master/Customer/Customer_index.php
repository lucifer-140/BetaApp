<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require '../DatabaseController/emkl_dbcon.php';

// Pagination settings
$limit = 10; // Number of rows to display per page

// Get the current page number
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the starting row number for the current page
$start = ($current_page - 1) * $limit;

// Get the sort column and sort order
$sort_column = isset($_GET['sort']) ? $_GET['sort'] : 'Order_No';
$sort_order = isset($_GET['order']) ? $_GET['order'] : 'ASC';

// Determine the column type for sorting
$sort_type = in_array($sort_column, ['Order_No']) ? 'numeric' : 'string';

// Query to retrieve data with pagination and sorting
$search = isset($_GET['search']) ? $_GET['search'] : '';
$query = "SELECT * FROM emkl WHERE Order_No LIKE '%$search%' ORDER BY $sort_column $sort_order LIMIT $start, $limit";

$query_run = mysqli_query($con, $query);

// Query to count the total number of rows
$count_query = "SELECT COUNT(*) as count FROM emkl WHERE Order_No LIKE '%$search%'";
$count_result = mysqli_query($con, $count_query);
$count_row = mysqli_fetch_assoc($count_result);
$total_records = $count_row['count'];

// Calculate the total number of pages
$total_pages = ceil($total_records / $limit);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        .search-form {
            display: flex;
            align-items: center;
        }

        .search-input {
            margin-right: 10px;
        }

        .card-header .btn {
            margin-right: 10px;
        }
    </style>

    <title>BETA CRUD</title>
</head>

<body>
    <div class="container mt-4">

        <?php include('../message.php'); ?>

        <div class="row mb-3">
            <div class="col-md-6">
                <form action="" method="GET" class="search-form">
                    <input type="text" name="search" class="form-control search-input" placeholder="Search Order_No">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Data Details</h4>
                        <div>
                            <a href="emkl_create.php" class="btn btn-primary">Add Data</a>
                            <a href="../mainpage.php" class="btn btn-danger">Go to Main Page</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <a href="?page=<?= $current_page ?>&sort=Order_No&order=<?= $sort_order === 'ASC' ? 'DESC' : 'ASC' ?>" class="text-decoration-none">
                                            Order_No
                                            <?php if ($sort_column === 'Order_No') {
                                                echo $sort_order === 'ASC' ? '<i class="fas fa-sort-up ms-1"></i>' : '<i class="fas fa-sort-down ms-1"></i>';
                                            } ?>
                                        </a>
                                    </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($query_run) > 0) {
                                    while ($emkl = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                        <tr>
                                            <td><?= $emkl['Order_No']; ?></td>
                                            <td>
                                                <a href="emkl_view.php?id=<?= $emkl['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="emkl_edit.php?id=<?= $emkl['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <form action="emkl_code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_emklData" value="<?= $emkl['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='2'>No Record Found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <?php
                                // Render pagination links
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    echo "<li class='page-item " . ($current_page == $i ? 'active' : '') . "'><a class='page-link' href='emkl/emkl_index.php?page=$i&sort=$sort_column&order=$sort_order'>$i</a></li>";
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/6d4c114198.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
