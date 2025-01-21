<?php $__env->startSection('content'); ?>

    <div class="card mt-5">
        <h2 class="card-header">Create cabin</h2>
        <div class="card-body">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                <a class="btn btn-primary btn-sm" href="<?php echo e(route('ships.edit', $ship_id)); ?>"><i class="fa fa-arrow-left"></i> Back</a>
            </div>

            <?php $__sessionArgs = ['success'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
            <div class="alert alert-success mt-5" role="alert"> <?php echo e($value); ?> </div>
            <?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger mt-5">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('cabin.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="ship_id" value="<?php echo e($ship_id); ?>">
                <div class="mb-3">
                    <label for="inputDetail" class="form-label"><strong>Cabin vendor code:</strong></label>
                    <input
                        type="text"
                        name="vendor_code"
                        class="form-control"
                        id="inputName"
                        placeholder="Vendor code">
                </div>
                <div class="mb-3">
                    <label for="inputDetail" class="form-label"><strong>Cabin title:</strong></label>
                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        id="inputName"
                        placeholder="Title">
                </div>
                <div class="mb-3">
                    <label for="inputDetail" class="form-label"><strong>Cabin type:</strong></label>
                    <input
                        type="text"
                        name="type"
                        class="form-control"
                        id="inputName"
                        placeholder="Type">
                </div>
                <div class="mb-3">
                    <label for="inputDetail" class="form-label"><strong>Cabin description:</strong></label>
                    <textarea
                        class="form-control"
                        style="height:150px"
                        name="description"
                        id="inputDetail"
                        placeholder="Description"></textarea>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Create</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ships.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/cabin/create.blade.php ENDPATH**/ ?>