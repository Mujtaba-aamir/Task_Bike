<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Assignment Details</title>
  <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background: linear-gradient(to right, #ffffff, #f0f0f0);
        padding-top: 80px;
    }

    nav {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background-color: #222;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1rem 2rem;
        z-index: 1000;
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

    h2.heading {
        text-align: center;
        font-size: 1.8rem;
        color: #444;
        margin-top: 40px;
    }

    table {
        width: 90%;
        margin: 2rem auto;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    table th, table td {
        padding: 14px 16px;
        text-align: center;
        border-bottom: 1px solid #dee2e6;
    }

    table th {
        background-color: #0984e3;
        color: white;
        text-transform: uppercase;
        font-size: 0.9rem;
    }

    table tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    table tr:hover {
        background-color: #dfe6e9;
    }

    .custom-alert {
        width: 350px;
        margin: 100px auto 15px auto; 
        padding: 15px;
        border-radius: 5px;
        color: #fff;
        font-weight: bold;
        text-align: center;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);
    }

    .custom-alert.success {
        background-color: #00cc99; 
    }

    @media (max-width: 768px) {
        .heading {
            font-size: 1.4rem;
        }

        table th, table td {
            font-size: 0.9rem;
            padding: 10px;
        }
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

  <div style="margin-top: 30px;">
    @if (session('msg'))
      <div class="custom-alert success">
        {{ session('msg') }}
      </div>
    @endif
  </div>

  <h2 class="heading">Unassigned Bikes</h2>

  <table>
    <tr>
      <th>Bike Plate Number</th>
      <th>Rider Name</th>
      <th>Assigned At</th>
      <th>Unassigned At</th>
    </tr>
    @foreach ($unassigned as $bike)
      @foreach ($bike->riders as $rider)
        <tr>
          <td>{{ $bike->plate_number }}</td>
          <td>{{ $rider->full_name }}</td>
          <td>{{ $rider->pivot->assigned_at }}</td>
          <td>{{ \Carbon\Carbon::parse($rider->pivot->unassigned_at)->format('Y-m-d') }}</td>
        </tr>
      @endforeach
    @endforeach
  </table>
</body>
</html>
