<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rider Data</title>
</head>
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

    #btn {
        text-decoration: none;
        color: white;
    }

    button {
        display: block;
        margin: 0 auto 30px;
        padding: 10px 20px;
        background-color: #00b894;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        font-size: 15px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #019875;
    }

    table.container {
        width: 100%;
        margin-left: -50px;
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

    table a {
        text-decoration: none;
        color: #0984e3;
        font-weight: bold;
    }

    #delete a {
        color: #e74c3c; /* red */
    }

    #update a {
        color: #f1c40f; /* yellow */
    }

  
    table a:hover {
        text-decoration: underline;
    }

    .Page {
        text-align: center;
        margin-top: 20px;
        padding: 10px 0;
        background-color: #f5f6fa;
        border-radius: 6px;
        font-family: 'Segoe UI', sans-serif;
    }

    .Page a, 
    .Page span {
        display: inline-block;
        margin: 4px;
        padding: 6px 12px;
        color: #0984e3;
        background-color: #ffffff;
        border: 1px solid #dcdde1;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.2s ease, color 0.2s ease;
    }

    .Page a:hover {
        background-color: #dfe6e9;
        color: #2d3436;
    }

    .Page span[aria-current="page"] {
        background-color: #0984e3;
        color: white;
        font-weight: bold;
        border-color: #0984e3;
        cursor: default;
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
    <h1>Here's data of all the Registered Riders</h1>
    
    <table class="container">
        <tr>
            <th>ID</th>
           <th>Full Name</th>
            <th>Mobile Number</th>
            <th>Email</th>
            <th>Emirates ID Number</th>
            <th>Passport Number</th>
            <th>Visa Expiry Date</th>
            <th>Date of Birth</th>
            <th>Status</th>
            <th>View</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        @foreach ($riders as $rider)
        <tr>
           <td>{{ $rider->id }}</td>
           <td>{{ $rider->full_name }}</td>
           <td>{{ $rider->mobile_number }} </td>
           <td>{{ $rider->email }}</td>
           <td>{{ $rider->emirates_id_number }}</td>
           <td>{{ $rider->passport_number }}</td>
           <td>{{ $rider->visa_expiry_date }}</td>                
           <td>{{ $rider->date_of_birth }}</td>
           <td>{{ $rider->status }}</td>
           <td id="view"><a href="{{ route('rider.view',$rider->id) }}">View</a></td>
           <td id="delete"><a href="{{ route('rider.delete',$rider->id) }}">Delete</a></td>
           <td id="update"><a href="{{ route('rider.edit',$rider->id) }}">Update</a></td>   
        </tr>
        @endforeach  
    </table>

    @if(session('error'))
        <script>alert('{{ session('error') }}');</script>
    @endif

 
</body>
</html>