<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stripe Identity</title>
</head>
<body>
    <h2>Stripe Identity</h2>
    <form action="{{ url('stripe/verify-identity') }}">
        <button type="submit">Verify Identity</button>
        <p>Click the button above to start the identity verification process.</p>
        <p>Make sure you have set up your Stripe account and have the necessary API keys configured.</p>
    </form>
</body>
</html>