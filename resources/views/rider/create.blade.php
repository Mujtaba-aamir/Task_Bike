<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register Rider</title>
  <style>
    body {
        margin: 0;
        padding: 3rem 1rem;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(to right, #a8edea, #fed6e3);
        min-height: 100vh;
        padding-top: 100px;
    }

    .form-container {
        background-color: #ffffff;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        max-width: 420px;
        margin: 0 auto;
    }


    h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #333;
    }

    label {
        display: block;
        margin-top: 1.2rem;
        margin-bottom: 0.3rem;
        font-weight: 600;
        color: #444;
    }

    input,
    select {
        width: 100%;
        padding: 0.6rem;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
        font-size: 0.95rem;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    input:focus,
    select:focus {
        border-color: #7d5fff;
        box-shadow: 0 0 0 3px rgba(125, 95, 255, 0.15);
        outline: none;
    }

    select {
        appearance: none;
        background-image: url('data:image/svg+xml;charset=US-ASCII,<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><polygon fill="%23999" points="6,9 12,15 18,9"/></svg>');
        background-repeat: no-repeat;
        background-position: right 0.7rem center;
        background-size: 1rem;
    }

    button {
        margin-top: 2rem;
        padding: 0.75rem;
        width: 100%;
        border: none;
        background-color: #7d5fff;
        color: white;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #5f43ff;
    }

    .bike-info.active {
        display: block;
    }
 
    .custom-alert {
        width: 350px;
        margin: 0 auto 15px auto;
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

    @media (max-width: 500px) {
        .form-container {
            padding: 1.5rem 1.2rem;
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
        </div>
    </nav>

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

    <div class="form-container">
        <h2>Register Rider</h2>
        <form method="POST" action="{{ route('rider.store') }}">
            @csrf
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="full_name" value="{{ old('full_name') }}" required>
    
            <label for="mobile_number">Mobile Number</label>
            <input type="text" id="mobile_number" value="{{ old('mobile_number') }}" name="mobile_number" placeholder="+9715XXXXXXXX" required>
    
            <label for="email">Email</label>
            <input type="email" id="email" value="{{ old('email') }}" name="email" required>
    
            <label for="emirates_id_number">Emirates ID Number</label>
            <input type="text" id="emirates_id_number" value="{{ old('emirates_id_number') }}" name="emirates_id_number" required>
    
            <label for="passport_number">Passport Number</label>
            <input type="text" id="passport_number" value="{{ old('passport_number') }}" name="passport_number" required>
    
            <label for="visa_expiry_date">Visa Expiry Date</label>
            <input type="date" id="visa_expiry_date" value="{{ old('visa_expiry_date') }}" name="visa_expiry_date" required>
    
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" id="date_of_birth" value="{{ old('date_of_birth') }}" name="date_of_birth" required>

            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="">Select status</option>
                <option value="Active" disabled>Active</option>
                <option value="Inactive">Inactive</option>
                <option value="Suspended">Suspended</option>
            </select>

            <button type="submit">Submit</button>
        </form>
    </div>
  
</body>
</html>
