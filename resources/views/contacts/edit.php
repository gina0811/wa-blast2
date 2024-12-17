<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
</head>
<body>
    <h1>Edit Contact</h1>
    <form action="/contacts/update?id=<?= htmlspecialchars($contact['id']) ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($contact['name']) ?>" required>
        <br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="<?= htmlspecialchars($contact['phone']) ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($contact['email']) ?>">
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="/contacts">Back to List</a>
</body>
</html>
