<!DOCTYPE html>
<html>

<head>
    <title>Enable Two Factor Authentication</title>
</head>

<body>
    <div>
        <h2>Scan this QR code with your Google Authenticator app</h2>
        <div>
            <!-- Ensure that the src attribute contains the correct URL -->
            <img src="{{ $QR_Image }}" alt="QR Code">
        </div>
        <p>Secret: {{ $secret }}</p>
        <form action="{{ route('2fa.verify') }}" method="POST">
            @csrf
            <label for="secret">Enter the code from the app:</label>
            <input type="text" id="secret" name="secret" required>
            <button type="submit">Verify</button>
        </form>
    </div>
</body>

</html>
