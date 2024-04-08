<html>
    <head>
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <style>
            body{font-size:16pt;color:#999;margin:5px;}
            <h1>{font-size:50pt;text-align:right;color:#f6f6f6;margin: -20px 0px -30px 0px;letter-spacing:-4px;}
            ul{font-size:12pt;}
            hr{marign:25px 100px;border-top:1px dashed #ddd;}
            .menutitle{font-size:14pt;font-weight:bold;margin:0px;}
            .content{margin:10px;}
            .footer{text-align:right;font-size:10pt;margin:10px;border-bottom:solid 1px #ccc;color:#ccc;}
            th {background-color:#999; color:fff; padding:5px 10px;}
            td {border: solid 1px #aaa;color:#999; padding:5px 10px;}
        </style>
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    </head>
    <body>
        <h1><?php echo $__env->yieldContent('title'); ?></h1>
        <?php $__env->startSection('menuber'); ?>
        <h2 class="menutitle"> ※メニュー</h2>
        <ul><li><?php echo $__env->yieldSection(); ?></li></ul>
        <hr size="1">
        <div class="content"><?php echo $__env->yieldContent('content'); ?></div>
        <div class="footer"><?php echo $__env->yieldContent('footer'); ?></div>
    </body>
</html>
<?php /**PATH C:\Users\nagaryoryo0418\Desktop\X\resources\views/layouts/helloapp.blade.php ENDPATH**/ ?>