<?php

include("config.php");

$userId = $_GET['id']; 
$firstName = $_GET['firstName']; 
$lastName = $_GET['lastName'];
$userEmail = $_GET['userEmail']; 

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
        <div class="box form-box register-box">

            <?php

            include("config.php");

            if (isset($_POST['submit'])) {

                $firstName = $_POST['first_name'];
                $lastName = $_POST['last_name'];
                $userEmail = $_POST['user_email'];



                $stmt = $connection->prepare("UPDATE users SET firstName=?, lastName=?, email=? WHERE userId=?");

                $stmt->bind_param("sssi", $firstName, $lastName, $userEmail, $userId);

                $result = $stmt->execute();

                if ($result) {
                    echo " <div class='successMessageBox'>
                              <p>User successfully updated!
                          </div><br>
                ";
                } else {

                    echo " <div class='errorMessageBox'>
                                  <p>Failed to update User!</p>
                              </div><br>
                ";
                    echo " <a href='javascript:self.history.back()'>
                           <button class='btn'>Go Back </button>
                       </a>  
                ";
                }
            } else {


            ?>


                <header><span>Update</span><i class="fas fa-user-plus"></i></header>

                <form action="" method="post" id="register_form">

                    <div class="field input">
                        <label for="first_name">First name</label>
                        <input type="text" name="first_name" id="first_name" value="<?php echo htmlspecialchars($firstName); ?>" required>
                    </div>

                    <div class="field input">
                        <label for="last_name">Last name</label>
                        <input type="text" name="last_name" id="last_name" value="<?php echo htmlspecialchars($lastName); ?>" required>
                    </div>

                    <div class="field input">
                        <label for="user_email">Email</label>
                        <input type="text" name="user_email" id="user_email" value="<?php echo htmlspecialchars($userEmail); ?>" required>
                    </div>
                    <div class="field">
                        <button type="submit" class="btn" name="submit" value="SIGNUP">Update User</button>
                    </div>
                </form>
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

<?php } ?>
</body>

</html>