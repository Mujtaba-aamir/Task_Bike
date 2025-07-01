<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bike Data</title>
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
        width: 90%;
        margin: 0 auto;
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
    color: #e74c3c;
    }

    #update a {
    color: #f1c40f;
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
            <a href="<?php echo e(route('bike.home')); ?>">Home</a>
            <a href="<?php echo e(route('bike.create')); ?>">Register Your Bike</a>
            <a href="<?php echo e(route('bike.index')); ?>">View Registered Bikes</a>
            <a href="<?php echo e(route('rider.create')); ?>">Register Rider</a>
            <a href="<?php echo e(route('rider.index')); ?>">View Registered Riders</a>
            <a href="<?php echo e(route('assignment.create')); ?>">Bike Assignment</a>
        </div>
    </nav>
    <h1>Here's data of all the Registered Bikes</h1>
    
    <table class="container">
        <tr>
            <th>ID</th>
            <th>Plate Number</th>
            <th>Model</th>
            <th>Model Year</th>
            <th>Chassis Number</th>
            <th>Engine Number</th>
            <th>View</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php $__currentLoopData = $bikes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
           <td><?php echo e($bike->id); ?></td>
           <td><?php echo e($bike->plate_number); ?> </td>
           <td><?php echo e($bike->model); ?></td>
           <td><?php echo e($bike->model_year); ?></td>
           <td><?php echo e($bike->chassis_number); ?></td>
           <td><?php echo e($bike->engine_number); ?></td>
           <td id="view"><a href="<?php echo e(route('bike.view',$bike->id)); ?>">View</a></td>
           <td id="delete"><a href="<?php echo e(route('bike.delete',$bike->id)); ?>">Delete</a></td>
           <td id="update"><a href="<?php echo e(route('bike.edit',$bike->id)); ?>">Update</a></td>   
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
    </table>

    <?php if(session('error')): ?>
        <script>alert('<?php echo e(session('error')); ?>');</script>
    <?php endif; ?>

</body>
</html><?php /**PATH C:\Laravel Code\Task\resources\views/bike/index.blade.php ENDPATH**/ ?>