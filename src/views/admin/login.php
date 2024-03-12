<?php 
session_start(); 

if (isset($_POST['login'])) { 
    $mysqli = new mysqli("localhost", "root", "", "solidtemp"); 

    if ($mysqli->connect_error) { 
        die("Connection failed: " . $mysqli->connect_error); 
    } 

    $email = $_POST['email']; 
    $password = $_POST['password']; 

    $stmt = $mysqli->prepare("SELECT id, password FROM login_system WHERE email = ?"); 
    $stmt->bind_param("s", $email); 

    $stmt->execute(); 
    $stmt->store_result(); 

    if ($stmt->num_rows > 0) { 
        $stmt->bind_result($id, $hashed_password); 

        $stmt->fetch(); 

        if (password_verify($password, $hashed_password)) { 
            $_SESSION['loggedin'] = true; 
            $_SESSION['id'] = $id; 
            $_SESSION['email'] = $email; 

            header("Location: admin/dashboard"); exit;
        } else { 
            echo "Incorrect password!"; 
        } 
    } else { 
        echo "User not found!"; 
    } 

    $stmt->close(); 
    $mysqli->close(); 
} 
?>

<form method="post">
    <input type="text" name="email" placeholder="Email" />
    <input type="password" name="password" placeholder="Password" />
    <button type="submit" name="login">Login</button>
</form>