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
    <div class="main_container">
    <form action="<?php echo e(route('update_bike', $data->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <div class="form-row">
        <label>Plate Number:</label>
        <input type="text" name="plate_number" value="<?php echo e($data->plate_number); ?>" required>
    </div>

    <div class="form-row">
        <label>Model:</label>
        <input type="text" name="model" value="<?php echo e($data->model); ?>" required>
    </div>

    <div class="form-row">
        <label>Model Year:</label>
        <input type="number" name="model_year" value="<?php echo e($data->model_year); ?>" required>
    </div>

    <div class="form-row">
        <label>Chassis Number:</label>
        <input type="text" name="chassis_number" value="<?php echo e($data->chassis_number); ?>" required>
    </div>

    <div class="form-row">
        <label>Engine Number:</label>
        <input type="text" name="engine_number" value="<?php echo e($data->engine_number); ?>" required>
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

    <?php if(session('msg')): ?>
    <div class="custom-alert success">
        <?php echo e(session('msg')); ?>

    </div>
<?php endif; ?>



</body>
</html><?php /**PATH C:\Laravel Code\Task\resources\views/Update.blade.php ENDPATH**/ ?>