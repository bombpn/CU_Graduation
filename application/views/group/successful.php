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
        	echo "<h1 class=".'page-header'.">อัพเดทข้อมูลสำเร็จ <small>Successfully Update</small></h1>" ;
			$opt = "search" ;
        }
    	else if($opt=="create") {
    		echo "<h1 class=".'page-header'.">สร้างกลุ่มสำเร็จ <small>Successfully Create</small></h1> " ; 
    	    echo "<h1 class=".'page-header'."><small>ชื่อกลุ่ม : ".$Gname." </small></h1> " ;
            $opt = "" ;
        }
    	else if($opt=="importcsv") {
    		echo "<h1 class=".'page-header'.">นำเข้าข้อมูลสำเร็จ <small>Successfully Import</small></h1> " ; 
    		echo "<h1 class=".'page-header'."><small> จำนวน "."$num_records"."กลุ่ม</small></h1> " ;
    		$opt = "index" ;
    	}
    	else if($opt=="del") {
    		echo "<h1 class=".'page-header'.">ลบข้อมูลสำเร็จ <small>Successfully Delete</small></h1> " ; 
    		$opt = "";
    	}
    	else if($opt=="upload") {
    		echo "<h1 class=".'page-header'.">อัพโหลดข้อมูลสำเร็จ <small>Successfully Upload CSV</small></h1> " ; 
    		$opt = "index";
    	}
        echo anchor("group/".$opt ,"กลับ",array(
                        'name'=>'BackButton', 'class'=>'btn btn-primary'
                        )) ;
        ?>
</div>
<!-- /.row -->
</body>
</html>
