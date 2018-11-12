<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $_title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">   
    <?php 
      if (!empty($_styles)) {
          echo $_styles;
      }
    ?>
    
    <?php 
      if(!empty($_scripts)){
          echo $_scripts;
      }
    ?>
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/jquery-ui.css"> -->
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->    
</head>
<body>
<!-- Template Header -->
<?php echo $_header; ?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      
    <?php echo $_content; ?>

    </div>
  </div>
</div>

<!-- Template Footer --> 
<?php echo $_footer; ?>

<script type="text/javascript">
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "100",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    <?php 
    if(isset($notif)) {
    
        $type = $notif['type'];
        $message_notif = $notif['message'];
        echo 'toastr["'.$type.'"]("'.$message_notif.'", "'.ucwords($type).'")';
    }
    ?>
</script>
</body>
</html>
