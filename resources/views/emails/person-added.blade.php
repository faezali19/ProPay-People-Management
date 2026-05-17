<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f6f9; padding: 30px; }
        .card { background: white; border-radius: 10px; padding: 30px; max-width: 500px; margin: 0 auto; }
        h2 { color: #1a1a2e; }
        .highlight { color: #e63946; font-weight: bold; }
        table { width: 100%; margin-top: 20px; }
        td { padding: 8px 0; color: #444; font-size: 14px; }
        td:first-child { font-weight: bold; color: #1a1a2e; width: 40%; }
        .footer { text-align: center; margin-top: 20px; color: #888; font-size: 12px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Pro<span class="highlight">Pay</span> SA</h2>
        <p>A new person has been added to the system.</p>
        <table>
            <tr><td>Name:</td><td>{{ $person->name }} {{ $person->surname }}</td></tr>
            <tr><td>SA ID:</td><td>{{ $person->sa_id_number }}</td></tr>
            <tr><td>Mobile:</td><td>{{ $person->mobile_number }}</td></tr>
            <tr><td>Email:</td><td>{{ $person->email_address }}</td></tr>
            <tr><td>Birth Date:</td><td>{{ $person->birth_date }}</td></tr>
            <tr><td>Language:</td><td>{{ $person->language }}</td></tr>
            <tr><td>Interests:</td><td>{{ $person->interests }}</td></tr>
        </table>
        <div class="footer">ProPay SA &mdash; People Management System</div>
    </div>
</body>
</html>