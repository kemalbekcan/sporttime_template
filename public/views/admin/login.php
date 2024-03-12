<?php 
session_start(); 

if (isset($_POST['login'])) { 
    // Connect to the database 
    $mysqli = new mysqli("localhost", "root", "", "solidtemp"); 

    // Check for errors 
    if ($mysqli->connect_error) { 
        die("Connection failed: " . $mysqli->connect_error); 
    } 

    // Get the form data 
    $email = $_POST['email']; 
    $password = $_POST['password']; 

    // Prepare and bind the SQL statement 
    $stmt = $mysqli->prepare("SELECT id, password FROM login_system WHERE email = ?"); 
    $stmt->bind_param("s", $email); 

    // Execute the SQL statement 
    $stmt->execute(); 
    $stmt->store_result(); 

    // Check if the user exists 
    if ($stmt->num_rows > 0) { 
        // Bind the result to variables 
        $stmt->bind_result($id, $hashed_password); 

        // Fetch the result 
        $stmt->fetch(); 

        // Verify the password 
        if (password_verify($password, $hashed_password)) { 
            // Set the session variables 
            $_SESSION['loggedin'] = true; 
            $_SESSION['id'] = $id; 
            $_SESSION['email'] = $email; 

            // Redirect to the user's dashboard 
            header("Location: admin/dashboard"); exit;
        } else { 
            echo "Incorrect password!"; 
        } 
    } else { 
        echo "User not found!"; 
    } 

    // Close the connection 
    $stmt->close(); 
    $mysqli->close(); 
} 
?>

<section class="admin-login">
    <img src="./img/linrime_logo.png" alt="" width="200px">
    <form action="" method="post" class="form">
        <p class="form__title">Please fill in your unique admin login details below</p>
        <div class="form__field">
        <label for="">Email Address</label>
        <input type="text" name="email" placeholder="Email">
        </div>
        <div class="form__field">
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Password">
        </div>
        <a href="" class="form__forgot">Forgot Password ?</a>
        <button type="submit" name="login">Login</button>  
    </form>
</section>