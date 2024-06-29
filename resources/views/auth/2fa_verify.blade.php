<!DOCTYPE html>
<html>

<head>
    <title>Verify Two Factor Authentication</title>
</head>

<body>
    <div>
        <h2>Enter the code from your Google Authenticator app</h2>
        <form action="{{ route('2fa.verify') }}" method="POST">
            @csrf
            <label for="secret">Enter the code:</label>
            <input type="text" id="secret" name="secret" required>
            <button type="submit">Verify</button>
        </form>
    </div>
</body>

</html>
