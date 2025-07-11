<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Breakdown</title>
    <style>
        body {
            margin: 0;
            padding: 40px;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            padding-top: 80px;
        }

        h1 {
            text-align: center;
            color: #2d3436;
            margin-bottom: 20px;
        }

        table.container {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table th, table td {
            padding: 14px 16px;
            border-bottom: 1px solid #dee2e6;
            text-align: center;
        }

        table th {
            background-color: #0984e3;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        table tr:hover {
            background-color: #dfe6e9;
        }

        nav {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #222;
            padding: 1rem 2rem;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 2;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 1rem;
            font-size: 1rem;
            position: relative;
            transition: color 0.3s;
        }

        nav a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 0;
            height: 2px;
            background-color: #00cc99;
            transition: width 0.3s;
        }

        nav a:hover::after,
        nav a:focus::after {
            width: 100%;
        }
    </style>
</head>
<body>
    <nav>
        <div style="margin-right: auto; color: #00cc99; font-size: 1.8rem; font-weight: bold;">
            RideSecure
        </div>
        <div style="display: flex; justify-content: center; gap: 2rem;">
            <a href="{{ route('bike.home') }}">Home</a>
            <a href="{{ route('bike.create') }}">Register Your Bike</a>
            <a href="{{ route('bike.index') }}">View Registered Bikes</a>
            <a href="{{ route('rider.create') }}">Register Rider</a>
            <a href="{{ route('rider.index') }}">View Registered Riders</a>
            <a href="{{ route('assignment.create') }}">Bike Assignment</a>
        </div>
    </nav>

    <h1>Rent Breakdown for Bike {{ $bike->plate_number }} - {{ $month->format('M Y') }}</h1>

    <table class="container">
        <thead>
            <tr>
                <th>Rider</th>
                <th>From</th>
                <th>To</th>
                <th>Assigned Days</th>
                <th>Rent Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $r)
            <tr>
                <td>{{ $r['rider'] }}</td>
                <td>{{ $r['assigned_from'] }}</td>
                <td>{{ $r['assigned_to'] }}</td>
                <td>{{ $r['assigned_days'] }}</td>
                <td>{{ number_format($r['calculated_rent']) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
