<!DOCTYPE html>
<html lang="th">

<head>
    <title>CU Graduation</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url();?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url();?>/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url();?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="<?=base_url();?>/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>/js/bootstrap.min.js"></script>
</head>

<body style="margin:0;padding:0">
<!-- Page Heading -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    เช็คชื่อ
                </h1>
                <div class="col-lg-9">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <form class="form-inline" method="post" autocomplete="off">
                                <div class="form-group">
                                    <label for="barcode">Barcode</label>
                                    <input type="text" class="form-control" name="barcode" id="barcode" placeholder="">
                                    <input type="hidden" name="schedule_id" value="<?=$schedule_detail->schedule_id;?>">
                                    <input type="hidden" name="group_id" value="<?=$active_group;?>">
                                    <?php 
                                        if($has_data == 'has'){ 
                                            $prev_num = $student->order; 
                                        }else{ 
                                            $prev_num = 0;
                                        } 
                                    ?>
                                    <input type="hidden" name="prev_num" value="<?=$prev_num;?>">
                                    <script>
                                        window.onload = function() {
                                            document.getElementById("barcode").focus();
                                        };
                                    </script>
                                </div>
                                <button type="submit" class="btn btn-primary">Check</button>
                            </form>
                        </div>
                        <!--div class="panel-body">
                            Panel content
                        </div-->
                    </div>
                    <?php
                    //if(count($first_faculty)>0){
                        //foreach($first_faculty as $student){
                        if($has_data=='has'){
                    ?>
                            <div class="panel panel-<?=$color;?>" id="<? //=$student->student_id;?>">
                                <div class="panel-heading">
                                    <div class="row">
                                        <!--h3 class="panel-title">Panel title</h3-->
                                        <div class="col-xs-6">
                                            <?php
                                            if(file_exists("GradPic/".$student->picture_path)) $imagePath = $student->picture_path;
                                            else $imagePath = "_blank_person.jpg"; 
                                            //if(!$has_data) $imagePath = "_blank_person.jpg"; 
                                            //else $imagePath = "";
                                            ?>
                                            <img src="<?=base_url();?>GradPic/<?=$imagePath;?>" class="img-thumbnail" width="100%">
                                        </div>
                                        <div class="col-xs-6" align="center" valign="middle">
                                            
                                            <?php if($message['inserted']){ ?>
                                                <h3><i class="fa fa-fw fa-check-square"></i> บันทึกสำเร็จ</h3>
                                            <?php }?>

                                            <?php if($message['skip']){ ?>
                                                <h3><i class="fa fa-fw fa-warning"></i> มีการข้ามลำดับ</h3>
                                            <?php }?>

                                            <?php if($message['late']){ ?>
                                                <h3><i class="fa fa-fw fa-clock-o"></i> มาเช็คชื่อช้า</h3>
                                            <?php }?>
                                            
                                            <?php if($message['prerequisite']){ ?>
                                                <h3><i class="fa fa-fw fa-times"></i> มาซ้อมไม่ครบ</h3>
                                            <?php }?>

                                            <?php if($message['previously_inserted']){ ?>
                                                <h3><i class="fa fa-fw fa-history"></i> เช็คชื่อในรอบนี้ไปแล้ว</h3>
                                            <?php }?>

                                            <h1 style="font-size:1100%;"># <?=$student->order;?></h1>
                                            <h3><?=$student->th_prefix;?><?=$student->th_firstname;?> <?=$student->th_lastname;?></h3>
                                            <h3><?=$student->en_prefix;?><?=$student->en_firstname;?> <?=$student->en_lastname;?></h3>
                                            <h4><?=$student->student_id;?></h4>
                                            <!--h4>คณะวิศวกรรมศาสตร์</h4-->
                                        </div>
                                    </div>
                                </div>
                                <!--div class="panel-body">
                                    Panel content
                                </div-->
                            </div>
                    <?php
                        }else if($has_data=='notfound'){
                        //}
                    //}
                    ?>
                            <div class="panel panel-red" id="<? //=$student->student_id;?>">
                                <div class="panel-heading">
                                    <div class="row">
                                        <!--h3 class="panel-title">Panel title</h3-->
                                        <div class="col-xs-6">
                                            <?php
                                            $imagePath = "_blank_person.jpg"; 
                                            ?>
                                            <img src="<?=base_url();?>GradPic/<?=$imagePath;?>" class="img-thumbnail" width="100%">
                                        </div>
                                        <div class="col-xs-6" align="center" valign="middle">
                                            <h3><i class="fa fa-fw fa-times"></i> มีข้อผิดพลาด</h3>
                                            <h1 style="font-size:800%;"># ไม่พบ</h1>
                                            <h1 style="font-size:400%;"><?=$barcode;?></h1>
                                            <!--h4>คณะวิศวกรรมศาสตร์</h4-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                        }else if($has_data == 'first'){
                        ?>
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <!--h3 class="panel-title">Panel title</h3-->
                                        <div class="col-xs-6">
                                            <?php
                                            $imagePath = "_blank_person.jpg"; 
                                            ?>
                                            <img src="<?=base_url();?>GradPic/<?=$imagePath;?>" class="img-thumbnail" width="100%">
                                        </div>
                                        <div class="col-xs-6" align="center" valign="middle">
                                            <h3>แสกนบาร์โค้ดเพื่อเช็คชื่อ</h3>
                                            <!--h4>คณะวิศวกรรมศาสตร์</h4-->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php 
                        }
                        ?>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                กลุ่มที่มีการซ้อม วันที่ <?=$schedule_detail->date;?><br>
                                เวลา <?=$schedule_detail->start_time;?> - <?=$schedule_detail->end_time;?>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <ul>
                            <?php
                            if(count($allgroup_in_schedule)>0){
                                foreach($allgroup_in_schedule as $group){
                                    //echo $schedule->schedule_id . " " . $schedule->date . " " . $schedule->start_time . " - " . $schedule->end_time . "<br>";
                            ?>
                                    
                                    <li>
                                        <?php if($attendance_order == $group->attendance_order) {?>
                                            <b><?=$group->attendance_order;?> : <?=$group->th_group_name;?></b>
                                        <?php }else{ ?>
                                            <a href="<?=base_url();?>check/barcode_check/<?=$schedule_detail->schedule_id;?>/<?=$group->attendance_order;?>"><?=$group->attendance_order;?> : <?=$group->th_group_name;?></a>
                                        <?php } ?>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
                    
            </div>
        </div>   
    </div>
</div>
<!-- /.row -->
</body>
</html>
