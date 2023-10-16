<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 5</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>List of Employees</h2>
        <a class="btn btn-primary" href="/myshop/create.php" role = "button">New Employee</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>SSN</th>
                    <th>dob</th>
                    <th>Name</th>
                    <th>Fname</th>
                    <th>Minit</th>
                    <th>Lname</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "myshop";

                //Create connection
                $connection = new mysqli($servername, $username, $password, $database);

                // Check Connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                // Read all row from database table
                $sql = "SELECT * FROM employee";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                

                // read data of each row
                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[SSN]</td>
                        <td>$row[dob]</td>
                        <td>$row[name]</td>
                        <td>$row[Fname]</td>
                        <td>$row[Minit]</td>
                        <td>$row[Lname]</td>
                        <td>
                            <a class = 'btn btn-primary btn-sm' href='/myshop/edit.php?id=$row[id]'>Edit</a>
                            <a class = 'btn btn-danger btn-sm' href='/myshop/delete.php?id=$row[id]'>Delete</a>
                        </td>
                    </tr>
                    ";
                }

                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

