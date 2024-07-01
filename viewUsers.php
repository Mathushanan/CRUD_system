<?php

include("config.php");

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteQuery = "DELETE FROM users WHERE UserId=$id";
    $connection->query($deleteQuery);
    header("Location: viewUsers.php");
}

// Handle Update
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    header("Location: updateUsers.php?id=$id");
}

// Fetch user data
$sql = "SELECT * FROM users";
$result = $connection->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniNest NSBM</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css\all.min.css">
</head>

<body>
    <nav>
        <div class="nav__logo"><img src="assets/logo.png" alt="logo" /></div>
        <ul class="nav__links">
            <li class="link"><a href="index.php">Home</a></li>
            <li class="link"><a href="#footer_section">Contact</a></li>
            <li class="link"><a href="viewUsers.php">View Users</a></li>
        </ul>
    </nav>


    <div class="login-container">
    <div class="box form-box display-box">
            <table>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['userId'] . "</td>";
                        echo "<td>" . $row['firstName'] . "</td>";
                        echo "<td>" . $row['lastName'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>
                        <a class='update-button' href='updateuser.php?id=" . $row['userId'] . "&firstName=" . $row['firstName'] . "&lastName=" . $row['lastName'] . "&userEmail=" . $row['email'] . "'>Update</a>
                        <a class='delete-button'href='viewusers.php?delete=" . $row['userId'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                      </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No users found</td></tr>";
                }
                ?>
            </table>



      
            </div>
    </div>











    <?php include("footer.php") ?>


    <script>
        document.getElementById("register_form").onsubmit = function() {
            return validateForm();
        };
        var validateForm = () => {

            let valid = true;
            const firstName = document.getElementById("first_name");
            const lastName = document.getElementById("last_name");
            const email = document.getElementById("user_email");
            if (firstName.value.trim() === "" || lastName.value.trim() === "" || email.value.trim() === "") {
                valid = false;
                alert("All fields are required!");
            }

            if (valid) {
                return true;
            } else {
                return false;
            }
        }
    </script>


</body>

</html>