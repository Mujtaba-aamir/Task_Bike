<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Bike</title>
    <link rel="stylesheet" href="/css/style.css">
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
        </div>
    </nav>
    <div class="main_container">
        <form action="{{ route('bike.update', $bike->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-row">
                <label>Plate Number:</label>
                <input type="text" name="plate_number" value="{{ $bike->plate_number }}" required>
            </div>
            <div class="form-row">
                <label>Model:</label>
                <input type="text" name="model" value="{{ $bike->model }}" required>
            </div>
            <div class="form-row">
                <label>Model Year:</label>
                <input type="number" name="model_year" value="{{ $bike->model_year }}" required>
            </div>
            <div class="form-row">
                <label>Chassis Number:</label>
                <input type="text" name="chassis_number" value="{{ $bike->chassis_number }}" required>
            </div>
            <div class="form-row">
                <label>Engine Number:</label>
                <input type="text" name="engine_number" value="{{ $bike->engine_number }}" required>
            </div>
            <div class="form-row">
                <label>Mulkiya Front Image:</label>
                <input type="file" name="mulkiya_front_image" required>
            </div>
            <div class="form-row">
                <label>Mulkiya Back Image:</label>
                <input type="file" name="mulkiya_back_image" required>
            </div>
            <button type="submit">Update Bike</button>
        </form>
    </div>

    @if (session('msg'))
        <div class="custom-alert success">
            {{ session('msg') }}
        </div>
    @endif
</body>
</html>