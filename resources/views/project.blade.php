<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/register" method="POST">
        <label>Username</label>
        <input type="text" name="username" >
        <label>First Name</label>
        <input type="text" name="fName">
        <label>Last Name</label>
        <input type="text" name="lName">
        <label>Email</label>
        <input type="email" name="email">
        <button name="submit">Submit</button>
    </form>

    @isset($username)
        {{ We get your username as $username, with complete name $first_name $lastname and email $email }}
    @endisset
</body>
</html>