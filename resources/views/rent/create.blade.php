<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>RideSecure</title>
  <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background: linear-gradient(to right, #ffffff, #f0f0f0);
        min-height: 100vh;
    }

    nav {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #222;
        padding: 1rem 2rem;
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

   
    .form-wrapper {
        max-width: 500px;
        margin: 2rem auto;
        background-color: #fff;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        margin-top: 6%;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #444;
        margin-top: 1rem;
    }

    select,
    input[type="month"],
    input[type="number"] {
        width: 100%;
        padding: 0.7rem;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 1rem;
        background-color: #f9f9f9;
    }

    button {
        margin-top: 2rem;
        width: 100%;
        padding: 0.75rem;
        background-color: #00cc99;
        border: none;
        color: white;
        font-size: 1rem;
        font-weight: bold;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #00b38c;
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

   

    <div class="form-wrapper">
        <form action="{{ route('rent.calculate') }}" method="GET">
            @csrf

            <label for="bike_id">Select Bike</label>
            <select name="bike_id" id="bike_id" required>
                <option value="" hidden>Choose bike</option>
                @foreach($bikes as $bike)
                    <option value="{{ $bike->id }}">{{ $bike->plate_number }}</option>
                @endforeach
            </select>

            <label for="month">Select Month</label>
            <input type="month" name="month" id="month" required>

            <label for="monthly_rent">Monthly Rent</label>
            <input type="number" name="monthly_rent" id="monthly_rent" required min="1" placeholder="Enter amount">

            <button type="submit">Calculate Rent</button>
        </form>
    </div>

</body>
</html>
