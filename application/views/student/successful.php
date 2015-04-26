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
        <?php
        if($opt=="edit") {
        	echo "<h1 class=".'page-header'.">อัพเดทข้อมูลสำเร็จ<small>Successfully Update</small></h1>" ;
			$opt = "search" ;
        }
    	else if($opt=="import") {
    		echo "<h1 class=".'page-header'.">นำเข้าข้อมูลสำเร็จ<small>Successfully Import</small></h1> " ; 
    	}
    	else if($opt=="importcsv") {
    		echo "<h1 class=".'page-header'.">นำเข้าข้อมูลสำเร็จ<small>Successfully Import</small></h1> " ; 
    		echo "<h1 class=".'page-header'."><small>"."$num_records"."</small></h1> " ;
    		$opt = "import" ;
    	}
    	else if($opt=="del") {
    		echo "<h1 class=".'page-header'.">ลบข้อมูลสำเร็จ<small>Successfully Delete</small></h1> " ; 
    		$opt = "";
    	}
    	else if($opt=="upload") {
    		echo "<h1 class=".'page-header'.">อัพโหลดข้อมูลสำเร็จ<small>Successfully Upload CSV</small></h1> " ; 
    		$opt = "import";
    	}
        echo anchor("student/".$opt ,"กลับ",array(
                        'name'=>'BackButton', 'class'=>'btn btn-primary'
                        )) ;
        ?>
</div>
<!-- /.row -->
</body>
</html>
