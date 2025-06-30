<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="/css/create.css">

    <title>Ride Secure</title>
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

    <form action="{{ route('bike.store') }}" method="POST" enctype="multipart/form-data">
       @csrf
        <input type="text" name="plate_number" placeholder="Plate Number" required>
        <input type="text" name="model" placeholder="Model" required>
        <input type="number" name="model_year" placeholder="Model Year" required>
        <input type="text" name="chassis_number" placeholder="Chassis Number" required>
        <input type="text" name="engine_number" placeholder="Engine Number" required>
        <label for="" style="color: white" >Mulkiya Front Image</label> <input type="file" name="mulkiya_front_image" required>
        <label for="" style="color: white" >Mulkiya Back Image</label><input type="file" name="mulkiya_back_image" required>
        <button type="submit">Register Bike</button>
    </form>

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

</body>
</html>