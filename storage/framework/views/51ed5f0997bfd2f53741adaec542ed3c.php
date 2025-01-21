<?php $__env->startSection('content'); ?>
    <div class="card mt-5">
        <h2 class="card-header">Pac Group</h2>
        <div class="card-body">

            <?php $__sessionArgs = ['success'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
            <div class="alert alert-success" role="alert"> <?php echo e($value); ?> </div>
            <?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?>

            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <h1>Ships</h1>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="<?php echo e(route('ships.create')); ?>"> <i class="fa fa-plus"></i> Create New Ship</a>
            </div>

            <table class="table table-bordered table-striped mt-4">
                <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="10%">Title</th>
                    <th width="20%">Spec</th>
                    <th width="45%">Description</th>
                    <th width="20%"></th>
                </tr>
                </thead>

                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $ships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e(++$i); ?></td>
                        <td><?php echo e($ship->title); ?></td>
                        <td><?php echo $ship->getSpecHtml(); ?></td>
                        <td><?php echo $ship->description; ?></td>
                        <td>
                            <form action="<?php echo e(route('ships.destroy',$ship->id)); ?>" method="POST">

                                <a class="btn btn-info btn-sm" href="<?php echo e(route('ships.show',$ship->id)); ?>"><i class="fa-solid fa-list"></i>
                                    Show</a>

                                <a class="btn btn-primary btn-sm" href="<?php echo e(route('ships.edit',$ship->id)); ?>"><i
                                        class="fa-solid fa-pen-to-square"></i> Edit</a>

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button onclick="return confirm('Are you sure you want to delete this item?');" type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <table class="table table-bordered table-striped mt-4">
                                <tr>
                                    <?php $__empty_2 = true; $__currentLoopData = $ship->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                        <td>
                                            <img src="<?php echo e($gallery->url); ?>" style="width: 100%" alt="<?php echo e($gallery->title); ?>" title="<?php echo e($gallery->title); ?>">
                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                        <td>There are no data.</td>
                                    <?php endif; ?>
                                </tr>
                            </table>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4">There are no data.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ships.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/ships/index.blade.php ENDPATH**/ ?>