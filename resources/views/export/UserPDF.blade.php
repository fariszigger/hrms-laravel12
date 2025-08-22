<!DOCTYPE html>
<html>
<head>
    <title>User List PDF</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 8px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h1>User List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Username</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td><td>{{ $user->name }}</td><td>{{ $user->username }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
