<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register Page</h2>
    <form method="post" action="/users/register">
        <label>Email:</label>
        <input type="email" name="email" required><br>
        
        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
