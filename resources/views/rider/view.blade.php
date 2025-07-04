<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rider Details</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(to right, #e0eafc, #cfdef3);
        color: #333;
        margin: 0;
        padding: 100px 40px 40px; /* Top padding added here */
        display: flex;
        flex-direction: column;
        align-items: center;
    }            

    h1 {
        font-size: 2.5em;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    h3 {
        font-size: 1.3em;
        background-color: #f8f9fa;
        padding: 10px 20px;
        border-left: 5px solid #3498db;
        margin: 10px 0;
        width: 300px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        border-radius: 4px;
    }

    nav {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
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
    <h1>Rider <span>#{{ $rider->id }} </span>Detail</h1>
    <h3>Full Name: {{ $rider->full_name }}</h3>
    <h3>Mobile Number: {{ $rider->mobile_number }}</h3>
    <h3>Email: {{ $rider->email }}</h3>
    <h3>Emirates ID Number: {{ $rider->emirates_id_number }}</h3>
    <h3>Passport Number: {{ $rider->passport_number }}</h3>
    <h3>Visa Expiry Date: {{ $rider->visa_expiry_date }}</h3>
    <h3>Date of Birth: {{ $rider->date_of_birth }}</h3>
    <h3>Status: {{ $rider->status }}</h3>
    @if($rider->bikes->count())
    <h2 style="margin-top: 30px; font-size: 1.5rem;">Assigned Bikes History</h2>

    <table style="width: 90%; max-width: 600px; margin-top: 15px; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #0984e3; color: white;">
                <th style="padding: 10px;">Plate Number</th>
                <th style="padding: 10px;">Assigned At</th>
                <th style="padding: 10px;">Unassigned At</th>
                <th style="padding: 10px;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rider->bikes as $bike)
                <tr style="background-color: #f9f9f9; text-align: center;">
                    <td style="padding: 10px;">{{ $bike->plate_number }}</td>
                    <td style="padding: 10px;">{{ $bike->pivot->assigned_at }}</td>
                    <td style="padding: 10px;">
                        {{ $bike->pivot->unassigned_at ? \Carbon\Carbon::parse($bike->pivot->unassigned_at)->format('Y-m-d') : '-' }}
                    </td>
                    <td style="padding: 10px; color: {{ $bike->pivot->status === 'assigned' ? 'green' : 'gray' }};">
                        {{ ucfirst($bike->pivot->status) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h3 style="margin-top: 30px;">No bike has been assigned to this rider yet.</h3>
@endif


</body>
</html>