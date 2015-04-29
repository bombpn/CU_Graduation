<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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
                    ตรวจสอบลำดับที่
                </h1>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <form class="form-inline" method="post" autocomplete="off">
                                <div class="form-group">
                                    <label for="barcode">Barcode หรือ รหัสนิสิต</label>
                                    <input type="text" class="form-control" name="barcode" id="barcode" placeholder="">
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
                        if($has_data=='has'){
                    ?>
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <!--h3 class="panel-title">Panel title</h3-->
                                        <div class="col-xs-4">
                                            <?php
                                            if(file_exists("GradPic/".$student->picture_path)) $imagePath = $student->picture_path;
                                            else $imagePath = "_blank_person.jpg"; 
                                            ?>
                                            <img src="<?=base_url();?>GradPic/<?=$imagePath;?>" class="img-thumbnail" width="100%">
                                        </div>
                                        <div class="col-xs-8" align="center" valign="middle">
                                            <h3><?=$student->th_prefix;?><?=$student->th_firstname;?> <?=$student->th_lastname;?></h3>
                                            <h3><?=$student->en_prefix;?><?=$student->en_firstname;?> <?=$student->en_lastname;?></h3>
                                            <h4><?=$student->student_id;?></h4>
                                            <?php
                                            foreach($student_join as $group){
                                            ?>
                                                <div class = "panel panel-warning">
                                                    <div class = "panel-heading">
                                                        <div class="row">
                                                            <div class="col-xs-3">
                                                                <h1 style="font-size:500%;"># <?=$group->order;?></h1>
                                                            </div>
                                                            <div class="col-xs-9">
                                                                <h4><?=$group->th_group_name;?> (<?=$group->en_group_name;?>)</h4>
                                                                <table class="table table-condensed">
                                                                    <thead>
                                                                        <th>รอบที่</th>
                                                                        <th>วันที่</th>
                                                                        <th>เวลา</th>
                                                                        <th>ลำดับที่รวม</th>
                                                                        <th>ที่นั่ง</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        foreach($group->schedule as $sched){
                                                                        ?>
                                                                            <tr <?php if($sched->date == date("Y-m-d")) echo 'class="success"';?>>
                                                                                <td><?=$sched->round;?></td>
                                                                                <td><?=$sched->date;?></td>
                                                                                <td><?=$sched->start_time;?> - <?=$sched->end_time;?></td>
                                                                                <td><?=$sched->absolute_num;?></td>
                                                                                <td><?=$sched->seat;?></td>
                                                                            </tr>
                                                                        <?php 
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <!--h1 style="font-size:1100%;"># <?=$cur_stu->order;?></h1>
                                            <h4><?=$cur_stu->th_group_name;?> (<?=$cur_stu->en_group_name?>)</h4-->
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
                                        <div class="col-xs-4">
                                            <?php
                                            $imagePath = "_blank_person.jpg"; 
                                            ?>
                                            <img src="<?=base_url();?>GradPic/<?=$imagePath;?>" class="img-thumbnail" width="100%">
                                        </div>
                                        <div class="col-xs-8" align="center" valign="middle">
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
                                        <div class="col-xs-4">
                                            <?php
                                            $imagePath = "_blank_person.jpg"; 
                                            ?>
                                            <img src="<?=base_url();?>GradPic/<?=$imagePath;?>" class="img-thumbnail" width="100%">
                                        </div>
                                        <div class="col-xs-8" align="center" valign="middle">
                                            <h3>แสกนบาร์โค้ดหลังบัตรนิสิต หรือพิมพ์รหัสนิสิตเพื่อตรวจสอบลำดับที่</h3>
                                            <!--h4>คณะวิศวกรรมศาสตร์</h4-->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php 
                        }
                        ?>
                </div>
            </div>
        </div>   
    </div>
</div>
<!-- /.row -->
</body>
</html>
