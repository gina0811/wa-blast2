<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
</head>
<body>
    <h1>Add Contact</h1>
    <form action="/contacts/store" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <br>
        <button type="submit">Save</button>
    </form>
    <a href="/contacts">Back to List</a>
</body>
</html>
