<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Update Assignment</title>
  <style>
    body{
        margin: 0;
        padding: 0;
        background: linear-gradient(to right, #f0f4f7, #d9e4ec);
        font-family: 'Segoe UI', sans-serif;
        min-height: 100vh;
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
        z-index: 1000;
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

    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding-top: 80px;
    }

    .form-container {
        background-color: #ffffff;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        width: 400px;
    }

    .form-container h2 {
        margin-bottom: 20px;
        text-align: center;
        color: #333;
    }  

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #444;
    }

    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #0984e3;
        color: white;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .custom-alert {
        width: 350px;
        margin: 100px auto 15px auto; 
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

    button:hover {
      background-color: #076bb0;
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
            <a href="<?php echo e(route('assignment.create')); ?>">Bike Assignment</a>
        </div>
    </nav>
    <div style="margin-top: 30px;">
        <?php if(session('msg')): ?>
            <div class="custom-alert success">
                <?php echo e(session('msg')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="custom-alert error">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
    <div class="wrapper">
    
        <div class="form-container">
            <h2>Update Assignment</h2>
            <form action="<?php echo e(route('assignment.update', [$currentBike->id, $currentRider->id])); ?>" method="POST">
             <?php echo csrf_field(); ?>
                <label for="bike_id">Select Bike:</label>
                <select name="bike_id" required>
                    <?php $__currentLoopData = $bikes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($bike->id); ?>" <?php echo e($bike->id ==$currentBike->id ?   'selected' : ''); ?>>
                            <?php echo e($bike->plate_number); ?>

                            </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <label for="rider_id">Select Rider:</label>
                <select name="rider_id" required>
                    <?php $__currentLoopData = $riders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($rider->id); ?>" <?php echo e($rider->id == $currentRider->id ? 'selected' : ''); ?>>
                        <?php echo e($rider->full_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

               <button type="submit">Update Assignment</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Laravel Code\Task\resources\views/assignment/edit.blade.php ENDPATH**/ ?>