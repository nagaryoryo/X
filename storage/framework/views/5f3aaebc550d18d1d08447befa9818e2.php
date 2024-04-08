

<?php $__env->startSection('title','add'); ?>

<?php $__env->startSection('menuber'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('menuber'); ?>
追加ページです。
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form action="/home/add" method="post">
    <table>
        <?php echo csrf_field(); ?>
        <tr><th>Message: </th><td><input type="text" name="message"></td></tr>
        <tr><th></th><td>
            <div style="border: 1px solid; width:42px;"><input type="submit" value="send"></div></td></tr>
    </table>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
Ｘつくってみた
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.homeapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\nagaryoryo0418\Desktop\X\resources\views/home/add.blade.php ENDPATH**/ ?>