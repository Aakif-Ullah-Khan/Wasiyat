<html>
<head>
    <title>Edit Data Action</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        p {
            text-align: center;
            margin: 10px 0;
            font-size: 18px;
            color: #333;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        a:hover {
            background-color: #0056b3;
        }

        font[color='red'] {
            color: #e74c3c;
            font-size: 16px;
            font-weight: bold;
        }

        font[color='green'] {
            color: #2ecc71;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    // Include the database connection file
    require_once("dbConnection.php");

    if (isset($_POST['update'])) {
        $id = mysqli_real_escape_string($mysqli, $_POST['id']);
        $name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $age = mysqli_real_escape_string($mysqli, $_POST['age']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);    

        if (empty($name) || empty($age) || empty($email)) {
            if (empty($name)) {
                echo "<font color='red'>Name field is empty.</font><br/>";
            }
            if (empty($age)) {
                echo "<font color='red'>Age field is empty.</font><br/>";
            }
            if (empty($email)) {
                echo "<font color='red'>Email field is empty.</font><br/>";
            }
        } else {
            $result = mysqli_query($mysqli, "UPDATE users SET `name` = '$name', `age` = '$age', `email` = '$email' WHERE `id` = $id");
            
            echo "<p><font color='green'>Data updated successfully!</font></p>";
            echo "<a href='index.php'>View Result</a>";
        }
    }
    ?>
</body>
</html>
