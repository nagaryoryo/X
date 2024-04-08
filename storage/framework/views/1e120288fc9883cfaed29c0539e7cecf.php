

<?php $__env->startSection('title','reply'); ?>

<?php $__env->startSection('menuber'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('menuber'); ?>
返信ページ
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('content'); ?>
<form action="/home/reply/<?php echo e($item->id); ?>" method="post">
   <?php echo csrf_field(); ?>
    <table>
    <td><br><?php echo e($item->name); ?></br></td>
    <td><br><?php echo e($item->message); ?></br></td>
    <tr><th>返信: </th><td><input type="text" name="message"></td></tr>
    <tr><th></th><td><div style="border: 1px solid; width:42px;"><input type="submit" value="send"></div></td></tr>
    </td>
    </table>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
Ｘつくってみた
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.homeapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\nagaryoryo0418\Desktop\X\resources\views/home/reply.blade.php ENDPATH**/ ?>