<?php $__env->startSection('content'); ?>

    <div class="card mt-5">
        <h2 class="card-header">Edit ship</h2>
        <div class="card-body">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                <a class="btn btn-primary btn-sm" href="<?php echo e(route('ships.index')); ?>"><i class="fa fa-arrow-left"></i> Back</a>
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

            <form action="<?php echo e(route('ships.update', $ship->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-3">
                    <label for="inputName" class="form-label"><strong>Title:</strong></label>
                    <input
                        type="text"
                        name="title"
                        value="<?php echo e($ship->title); ?>"
                        class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        id="inputName"
                        placeholder="Title">
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="form-text text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-3">
                    <label for="inputDetail" class="form-label"><strong>Spec:</strong></label>
                    <textarea
                        class="form-control <?php $__errorArgs = ['spec'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        style="height:150px"
                        name="spec"
                        id="inputDetail"
                        placeholder="Spec"><?php echo e($ship->spec); ?></textarea>
                    <?php $__errorArgs = ['spec'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="form-text text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-3">
                    <label for="inputDetail" class="form-label"><strong>Description:</strong></label>
                    <textarea
                        class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        style="height:150px"
                        name="description"
                        id="inputDetail"
                        placeholder="Description"><?php echo e($ship->description); ?></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="form-text text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
            </form>
        </div>
    </div>

    <div class="card mt-5">
        <h2 class="card-header">Edit cabin</h2>
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-5">
                <a class="btn btn-success btn-sm" href="<?php echo e(route('cabin.create', ['ship_id' => $ship->id])); ?>"> <i class="fa fa-plus"></i> Create new cabin</a>
            </div>
            <label for="inputDetail" class="form-label"><strong>Cabin:</strong></label>
            <?php $__empty_1 = true; $__currentLoopData = $ship->cabin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cabin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card-body">
                    <form action="<?php echo e(route('cabin.update', $cabin->id)); ?>" method="POST">
                        <input type="hidden" name="ship_id" value="<?php echo e($ship->id); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="mb-3">
                            <label for="inputDetail" class="form-label"><strong>Cabin vendor code:</strong></label>
                            <input
                                type="text"
                                name="vendor_code"
                                value="<?php echo e($cabin->vendor_code); ?>"
                                class="form-control"
                                id="inputName"
                                placeholder="Vendor code">
                        </div>
                        <div class="mb-3">
                            <label for="inputDetail" class="form-label"><strong>Cabin title:</strong></label>
                            <input
                                type="text"
                                name="title"
                                value="<?php echo e($cabin->title); ?>"
                                class="form-control"
                                id="inputName"
                                placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <label for="inputDetail" class="form-label"><strong>Cabin type:</strong></label>
                            <input
                                type="text"
                                name="type"
                                value="<?php echo e($cabin->type); ?>"
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
                                placeholder="Description"><?php echo e($cabin->description); ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                    </form>
                    <form action="<?php echo e(route('cabin.destroy',$cabin->id)); ?>" method="POST" style="margin-top: 15px;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <input type="hidden" name="ship_id" value="<?php echo e($ship->id); ?>">
                        <button onclick="return confirm('Are you sure you want to delete this item?');" type="submit"
                                class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
                <?php $__errorArgs = ['cabin-description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="form-text text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <td>There are no data.</td>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ships.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/ships/edit.blade.php ENDPATH**/ ?>