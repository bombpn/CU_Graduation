

<!DOCTYPE html>
<html lang="th">
<head>
    <title>CU Graduation</title>
    <!-- <link href="<?=base_url();?>css/calendar.css" rel="stylesheet"> -->
</head>

<body>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
			  เกิดข้อผิดพลาด 
            <small><?php echo "$error"?> Fail</small>
        </h1>
        <?php echo anchor("group/" ,"กลับ",array(
                        'name'=>'BackButton', 'class'=>'btn btn-primary'
                        )) ;
        ?>
    </div>
</div>
<!-- /.row -->
</body>
</html>
