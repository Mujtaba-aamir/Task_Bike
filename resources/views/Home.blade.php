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
    }

    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #222;
      padding: 1rem 2rem;
    }

    .logo {
      color: #00cc99;
      font-size: 1.8rem;
      font-weight: bold;
    }

    .register-link a {
      color: #fff;
      text-decoration: none;
      background-color: #00cc99;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      transition: background 0.3s;
    }

    .register-link a:hover {
      background-color: #009977;
    }

    .hero {
      text-align: center;
      padding: 4rem 2rem;
    }

    .hero img {
      max-width: 90%;
      height: auto;
      padding-top: 20px ;
    }

    .hero h1 {
      margin-top: 2rem;
      font-size: 2.2rem;
      color: #333;
    }

    .hero p {
      font-size: 1.2rem;
      margin-top: 1rem;
      color: #555;
    }

    @media (max-width: 768px) {
      .hero h1 {
        font-size: 1.6rem;
      }
      .hero p {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>
  <nav>
    <div class="logo">RideSecure</div>
    <div class="register-link"><a href="/form">Register Your Bike</a></div>
  </nav>

  <div class="hero">
     <h1>Every Ride Deserves Recognition</h1>
    <p>Register your bike with ease and ensure its identity is protected—because every journey matters.</p>
    <img src="https://images.unsplash.com/photo-1578721356725-b9002f477530?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDh8fG1vdG90YmlrZXxlbnwwfHwwfHx8MA%3D%3D" alt="Bike Image" />
   
  </div>
</body>
</html>
