<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="script.js"></script>
    <title>Document</title>

</head>
<body>

<style>

@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .dashboardbtn {
            padding: 10px 20px;
            background-color: #3291A1;
            margin-left: -10px;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button {
            padding: 5px 10px;
            background-color: #3291A1;
            margin-left: 1px;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .dashboardbtn:hover,
        button:hover {
            background-color: #29717D;
        }
        

        .custom-container {
            width: 100%;
            max-width: 1500px;
            min-height: 400px;
            margin: auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .search-container {
            margin-left: 1150px;
            width:100%;
            max-width:250px;
        }

        h1 {
            color: #1A5875;
        }

        table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        th,
        td {
            padding: 0.70rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
            font:
        }

        thead {
            background-color: #70D8D6;
            color: #1A5875;
        }

        .btn-update {
        background-color: #135C93;
        color: #fff;
        padding: 0.10rem 1rem;
    }

        .btn-delete {
        background-color: #9a0000;
        color: #fff;
        padding: 0.10rem 1.25rem;
        
    }

    </style>


<div class="custom-container">
    <div>
        <button onclick="backToDashboard()" class= "dashboardbtn">Back to Dashboard</button>
    </div>
<div class="search-container">
    <input type="text" id="searchInput" placeholder="Search by name...">
    <button onclick="searchTable()"><i class='bx bx-search-alt-2'></i></button>
</div><br>
    <h1>LIST OF STUDENTS</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Course</th>
                <th>Year Level</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
                <th>Mobile Number</th>
                <th>Date/Time Created:</th>
                <th>Status</th>
                <th>Operations</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "enrollment_system";

            $connection = new mysqli($servername, $username, $password, $database);

            if ($connection->connect_error) {
                die("Connection Failed: " . $connection->connect_error);
            }

            $sql = "SELECT * FROM registration";
            $result = $connection-> query($sql);

            if (!$result) {
                die("Invalid query: ". $connection->error);
            }
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["course"] . "</td>
                        <td>" . $row["year"] . "</td>
                        <td>" . $row["fname"] . "</td>
                        <td>" . $row["lname"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["mobile"] . "</td>
                        <td>" . $row["timestamp"] . "</td>
                        <td style='text-align: center;'>
                            <i class='bx bxs-check-circle' style='color: #00cc00;'></i>
                        </td>
                        <td>
                            <a class='btn btn-primary btn-sm btn-update' href='update.php?id=" . $row["id"] . "'>Update</a>
                            <a class='btn btn-danger btn-sm btn-delete' href='delete.php?id=" . $row["id"] . "'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>

        <script>
        function backToDashboard() {
            // Redirect to Admin.html
            window.location.href = "Admin.html";
        }
        </script>
                

    </table>
</body>
</html>