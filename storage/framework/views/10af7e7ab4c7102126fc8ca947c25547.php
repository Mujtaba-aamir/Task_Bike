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
        padding: 40px;
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
</style>

</head>
<body>
    <h1>Bike <span>#<?php echo e($data->id); ?> </span>Detail</h1>
     <h3><?php echo e($data->plate_number); ?></h3>
     <h3><?php echo e($data->model); ?></h3>
     <h3><?php echo e($data->model_year); ?></h3>
     <h3><?php echo e($data->chassis_number); ?></h3>
     <h3><?php echo e($data->chassis_number); ?></h3>
     <h3><?php echo e($data->engine_number); ?></h3>
</body>
</html><?php /**PATH C:\Laravel Code\Task\resources\views/View.blade.php ENDPATH**/ ?>