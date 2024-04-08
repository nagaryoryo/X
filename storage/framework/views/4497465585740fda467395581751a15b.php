

<?php $__env->startSection('title','delete'); ?>

<?php $__env->startSection('menuber'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('menuber'); ?>
削除ページです。
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form action="/home/del" method="post">
<?php echo csrf_field(); ?>
    <table>
    <?php $__currentLoopData = $message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <td><?php echo e($item->message); ?></td>
        <tr><td> <input type="hidden" name="message" value="<?php echo e($item->id); ?>">
            <div style="border: 1px solid; width:42px;"><input type="submit" value="削除"></div></td></tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
Ｘつくってみた
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.homeapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\nagaryoryo0418\Desktop\X\resources\views/home/del.blade.php ENDPATH**/ ?>