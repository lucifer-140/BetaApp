<?php
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin123') {
    header("Location: login.php");
    exit();
}

// Database Connection
$con = mysqli_connect("localhost", "root", "", "user");
if (!$con) {
    die('Connection Failed: ' . mysqli_connect_error());
}

// User Creation
if (isset($_POST['create_user'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "User created successfully";
    } else {
        $_SESSION['message'] = "Failed to create user";
    }

    header("Location: adminpage.php");
    exit();
}

// User Deletion 
if (isset($_POST['delete_user'])) {
    $user_id = mysqli_real_escape_string($con, $_POST['delete_user']);

    $query = "DELETE FROM users WHERE id='$user_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "User deleted successfully";
    } else {
        $_SESSION['message'] = "Failed to delete user";
    }

    header("Location: adminpage.php");
    exit();
}

// Fetch All Users
$query = "SELECT * FROM users";
$query_run = mysqli_query($con, $query);
$users = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

// Update Users Access
if (isset($_POST['update_access'])) {
    // Get the user IDs for which access is being updated
    $userIDs = isset($_POST['access_mainpage']) ? $_POST['access_mainpage'] : [];

    // Construct the update query
    $query = "UPDATE users SET ";
    $updates = [];

    // Check if the checkboxes are checked and set the corresponding access values 
    foreach ($userIDs as $userID) {
        $access_mainpage = isset($_POST['access_mainpage'][$userID]) ? 1 : 0;
        $access_master = isset($_POST['access_master'][$userID]) ? 1 : 0;
        $access_transaction = isset($_POST['access_transaction'][$userID]) ? 1 : 0; vuyvyufgyuyutctu       
        $access_laporan = isset($_POST['access_laporan'][$userID]) ? 1 : 0;
        $access_utility = isset($_POST['access_utility'][$userID]) ? 1 : 0;

        $updates[] = "access_mainpage = $access_mainpage, access_master = $access_master, access_transaction = $access_transaction, access_laporan = $access_laporan, access_utility = $access_utility WHERE id = $userID";
    }

    $query .= implode("; ", $updates);

    // Execute the update query
    $query_run = mysqli_multi_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "User access updated successfully";
    } else {
        $_SESSION['message'] = "Failed to update user access";
    }

    header("Location: adminpage.php");
    exit();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <?php if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-info" role="alert">
                <?php echo $_SESSION['message'];
                unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Admin Page</h4>
                    </div>
                    <div class="card-body">
                        <h5>Create User</h5>
                        <form action="adminpage.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="create_user">Create User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User List</h4>
                    </div>
                    <div class="card-body">
                        <?php if (count($users) > 0) : ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <td><?php echo $user['username']; ?></td>
                                            <td>
                                                <div class="password-container">
                                                    <input type="password" value="<?php echo $user['password']; ?>" disabled>
                                                    <button class="btn btn-primary btn-sm show-password-btn">Show</button>
                                                </div>
                                            </td>
                                            <td>
                                                <form action="adminpage.php" method="POST" class="d-inline">
                                                    <input type="hidden" name="delete_user" value="<?php echo $user['id']; ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p>No users found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Access</h4>
                    </div>
                    <div class="card-body">
                        <form action="adminpage.php" method="POST">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Main Page</th>
                                        <th>Master</th>
                                        <th>Transaction</th>
                                        <th>Laporan</th>
                                        <th>Utility</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <td><?php echo $user['username']; ?></td>
                                            <td>
                                                <input type="checkbox" name="access_mainpage[<?php echo $user['id']; ?>]" value="1" <?php echo ($user['access_mainpage']) ? 'checked' : ''; ?>>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="access_master[<?php echo $user['id']; ?>]" value="1" <?php echo ($user['access_master']) ? 'checked' : ''; ?>>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="access_transaction[<?php echo $user['id']; ?>]" value="1" <?php echo ($user['access_transaction']) ? 'checked' : ''; ?>>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="access_laporan[<?php echo $user['id']; ?>]" value="1" <?php echo ($user['access_laporan']) ? 'checked' : ''; ?>>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="access_utility[<?php echo $user['id']; ?>]" value="1" <?php echo ($user['access_utility']) ? 'checked' : ''; ?>>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary" name="update_access">Update Access</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="mainpage.php" class="btn btn-primary">Go to Main Page</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script to handle the Show Password button functionality
        const showPasswordButtons = document.querySelectorAll('.show-password-btn');
        showPasswordButtons.forEach(button => {
            button.addEventListener('click', () => {
                const passwordContainer = button.parentElement;
                const passwordInput = passwordContainer.querySelector('input[type="password"]');
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    button.textContent = 'Hide';
                } else {
                    passwordInput.type = 'password';
                    button.textContent = 'Show';
                }
            });
        });
    </script> 
</body>

</html>
