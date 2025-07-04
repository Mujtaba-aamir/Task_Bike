<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Assigned Bikes</title>
  <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background: linear-gradient(to right, #ffffff, #f0f0f0);
        padding-top: 80px;
    }

    nav {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background-color: #222;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1rem 2rem;
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

    h2.heading {
        text-align: center;
        font-size: 1.8rem;
        color: #444;
        margin-top: 30px;
    }

    table {
        width: 90%;
        margin: 2rem auto;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    table th, table td {
        padding: 14px 16px;
        text-align: center;
        border-bottom: 1px solid #dee2e6;
    }

    table th {
        background-color: #0984e3;
        color: white;
        text-transform: uppercase;
        font-size: 0.9rem;
    }

    table tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    table tr:hover {
        background-color: #dfe6e9;
    }

    table button {
        background-color: #e74c3c;
        color: white;
        padding: 6px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 5px;
    }

    table button:hover {
        opacity: 0.9;
    }

    table a {
        color: #0984e3;
        text-decoration: none;
        font-weight: bold;
    }

    table a:hover {
        text-decoration: underline;
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

    @media (max-width: 768px) {
        h2.heading {
            font-size: 1.4rem;
        }

        table th, table td {
            font-size: 0.9rem;
            padding: 10px;
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
        <a href="<?php echo e(route('assignment.create')); ?>">Bike Assignment</a>
    </div>
  </nav>

  <div style="margin-top: 30px;">
    <?php if(session('msg')): ?>
        <div class="custom-alert success">
            <?php echo e(session('msg')); ?>

        </div>
    <?php endif; ?>
  </div>

  <h2 class="heading">Assigned Bikes</h2>

  <table>
    <tr>
        <th>Bike Plate Number</th>
        <th>Rider Name</th>
        <th>Assigned At</th>
        <th>Actions</th>
    </tr>
    <?php $__currentLoopData = $assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $bike->riders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($bike->plate_number); ?></td>
            <td><?php echo e($rider->full_name); ?></td>
            <td><?php echo e($rider->pivot->assigned_at); ?></td>
            <td>
                <form action="<?php echo e(route('assignment.unassign', [$bike->id, $rider->id])); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to unassign this rider?')">
                    <?php echo csrf_field(); ?>
                    <button type="submit">Unassign</button>
                </form>
                <a href="<?php echo e(route('assignment.edit', [$bike->id, $rider->id])); ?>">Update</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </table>
</body>
</html>
<?php /**PATH C:\Laravel Code\Task\resources\views/assignment/index.blade.php ENDPATH**/ ?>