<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
</head>
<body>
    <h1>Contact List</h1>
    <a href="/contacts/create">Add New Contact</a>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?= htmlspecialchars($contact['id']) ?></td>
                <td><?= htmlspecialchars($contact['name']) ?></td>
                <td><?= htmlspecialchars($contact['phone']) ?></td>
                <td><?= htmlspecialchars($contact['email']) ?></td>
                <td>
                    <a href="/contacts/edit?id=<?= $contact['id'] ?>">Edit</a>
                    <a href="/contacts/delete?id=<?= $contact['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
