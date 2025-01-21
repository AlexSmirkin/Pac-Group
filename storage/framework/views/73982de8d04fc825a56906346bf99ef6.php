<?php $__env->startSection('content'); ?>

    <div class="card mt-5">
        <h2 class="card-header">Show ship</h2>
        <div class="card-body">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary btn-sm" href="<?php echo e(route('ships.index')); ?>"><i class="fa fa-arrow-left"></i> Back</a>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong> <br/>
                        <?php echo e($ship->title); ?>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Spec:</strong> <br/>
                        <?php echo $ship->getSpecHtml(); ?>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Description:</strong> <br/>
                        <?php echo $ship->description; ?>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Ships gallery:</strong> <br/>
                        <table class="table table-bordered table-striped mt-4">
                            <tr>
                                <?php $__empty_1 = true; $__currentLoopData = $ship->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <td>
                                        <img src="<?php echo e($gallery->url); ?>" style="width: 100%" alt="<?php echo e($gallery->title); ?>"
                                             title="<?php echo e($gallery->title); ?>">
                                    </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <td>There are no data.</td>
                                <?php endif; ?>
                            </tr>
                        </table>
                    </div>
                </div>
                <strong>Cabin:</strong> <br/>
                <?php $__empty_1 = true; $__currentLoopData = $ship->cabin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cabin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <table class="table table-bordered table-striped mt-4">
                                <tr>
                                    <td>
                                        <strong><?php echo e($cabin->title); ?>(<?php echo e($cabin->vendor_code); ?> <?php echo e($cabin->type); ?>)</strong> <br/> <br/>
                                        <?php echo $cabin->description; ?>

                                        <img src="<?php echo e($cabin->getOnePhotoUrl()); ?>" style="width: 100%">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <td>There are no data.</td>
                <?php endif; ?>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ships.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/ships/show.blade.php ENDPATH**/ ?>