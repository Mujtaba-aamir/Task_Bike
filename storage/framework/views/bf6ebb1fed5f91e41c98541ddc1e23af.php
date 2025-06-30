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

    .hero {
        text-align: center;
        padding: 4rem 2rem;
    }

    .hero img {
        max-width: 90%;
        height: auto;
        padding-top: 20px;
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
        <div style="margin-right: auto; color: #00cc99; font-size: 1.8rem; font-weight: bold;">
            RideSecure
        </div>
        <div style="display: flex; justify-content: center; gap: 2rem;">
            <a href="<?php echo e(route('bike.home')); ?>">Home</a>
            <a href="<?php echo e(route('bike.create')); ?>">Register Your Bike</a>
            <a href="<?php echo e(route('bike.index')); ?>">View Registered Bikes</a>
            <a href="<?php echo e(route('rider.create')); ?>">Register Rider</a>
            <a href="<?php echo e(route('rider.index')); ?>">View Registered Riders</a>
        </div>
    </nav>

    <div class="hero">
        <h1>Every Ride Deserves Recognition</h1>
        <p>Register your bike with ease and ensure its identity is protected—because every journey matters.</p>
        <img src="https://images.unsplash.com/photo-1578721356725-b9002f477530?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0" alt="Bike Image"/>
    </div>
</body>
</html>
<?php /**PATH C:\Laravel Code\Task\resources\views/bike/home.blade.php ENDPATH**/ ?>