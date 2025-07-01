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
    <div class="main_container">
        <form action="<?php echo e(route('bike.update', $bike->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
            <div class="form-row">
                <label>Plate Number:</label>
                <input type="text" name="plate_number" value="<?php echo e($bike->plate_number); ?>" required>
            </div>
            <div class="form-row">
                <label>Model:</label>
                <input type="text" name="model" value="<?php echo e($bike->model); ?>" required>
            </div>
            <div class="form-row">
                <label>Model Year:</label>
                <input type="number" name="model_year" value="<?php echo e($bike->model_year); ?>" required>
            </div>
            <div class="form-row">
                <label>Chassis Number:</label>
                <input type="text" name="chassis_number" value="<?php echo e($bike->chassis_number); ?>" required>
            </div>
            <div class="form-row">
                <label>Engine Number:</label>
                <input type="text" name="engine_number" value="<?php echo e($bike->engine_number); ?>" required>
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
</html><?php /**PATH C:\Laravel Code\Task\resources\views/bike/edit.blade.php ENDPATH**/ ?>