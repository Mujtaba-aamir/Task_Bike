<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="/css/create.css">

    <title>Ride Secure</title>
</head>
<body>
    <form action="/store" method="POST" enctype="multipart/form-data">
     <?php echo csrf_field(); ?>
     <input type="text" name="plate_number" placeholder="Plate Number" required>
     <input type="text" name="model" placeholder="Model" required>
     <input type="number" name="model_year" placeholder="Model Year" required>
     <input type="text" name="chassis_number" placeholder="Chassis Number" required>
     <input type="text" name="engine_number" placeholder="Engine Number" required>
      <label for="" style="color: white" >Mulkiya Front Image</label> <input type="file" name="mulkiya_front_image" required>
      <label for="" style="color: white" >Mulkiya Back Image</label><input type="file" name="mulkiya_back_image" required>
     <button type="submit">Register Bike</button>
     
 </form>

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


</body>
</html><?php /**PATH C:\Laravel Code\Task\resources\views/Form.blade.php ENDPATH**/ ?>