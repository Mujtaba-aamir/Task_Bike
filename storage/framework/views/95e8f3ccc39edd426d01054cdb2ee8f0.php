<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <a href="<?php echo e(route('bike.home')); ?>">Home</a>
    <a href="<?php echo e(route('bike.create')); ?>">Register Your Bike</a>
    <a href="<?php echo e(route('bike.index')); ?>">View Registered Bikes</a>
    <a href="<?php echo e(route('rider.create')); ?>">Register Rider</a>
    <a href="<?php echo e(route('rider.index')); ?>">View Registered Riders</a>
  </div>
</nav>
    <h1>Bike <span>#<?php echo e($bike->id); ?> </span>Detail</h1>
    <h3>Plate Number: <?php echo e($bike->plate_number); ?></h3>
    <h3>Model: <?php echo e($bike->model); ?></h3>
    <h3>Model Year: <?php echo e($bike->model_year); ?></h3>
    <h3>Chassis Number: <?php echo e($bike->chassis_number); ?></h3>
    <h3>Engine Number: <?php echo e($bike->engine_number); ?></h3>
</body>
</html><?php /**PATH C:\Laravel Code\Task\resources\views/bike/view.blade.php ENDPATH**/ ?>