<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Assign Rider to Bike</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #f0f4f7, #d9e4ec);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
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

        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding-top: 80px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .form-container h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #0984e3;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #076bb0;
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
    
        .custom-alert.error {
            background-color: #00cc99; 
        }
    
        .custom-alert ul {
            margin: 0;
            padding-left: 20px;
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

        @if ($errors->any())
            <div class="custom-alert error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="wrapper" style="margin-top: -40px;">
        <div class="form-container">
            <h2>Assign Rider to Bike</h2>

            <form action="{{ route('assignment.store') }}" method="POST">
                @csrf

                <label for="bike_id">Select Bike:</label>
                <select name="bike_id" required>
                    <option hidden selected>Choose Bike</option>
                    @foreach($bikes as $bike)
                        <option value="{{ $bike->id }}">{{ $bike->plate_number }}</option>
                    @endforeach
                </select>

                <label for="rider_id">Select Rider:</label>
                <select name="rider_id" required>
                    <option hidden selected>Choose Rider</option>
                    @foreach($riders as $rider)
                        <option value="{{ $rider->id }}">{{ $rider->full_name }}</option>
                    @endforeach
                </select>

                <button type="submit">Assign</button>
            </form>

            <div style="margin-top: 20px; text-align: center;">
                <a href="{{ route('assignment.index') }}" 
                   style="display: inline-block; padding: 10px 20px; background-color: #00cc99; color: white; text-decoration: none; border-radius: 6px; font-weight: bold;">
                   View Assigned Bikes
                </a>
            </div>
        </div>
    </div>
</body>
</html>
