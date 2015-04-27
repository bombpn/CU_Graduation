<!DOCTYPE html>
<html lang="th">

<head>

    <title>CU Graduation</title>
</head>

<body>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ข้อมูลการซ้อมนอกรอบของบัณฑิต
            <small>Permitted Graduate Information</small>
        </h1>
        <?php
            $student = $thisstudent[0];
            $th = $student->th_prefix.' '.$student->th_firstname.' '.$student->th_lastname;
            $en = $student->en_prefix.' '.$student->en_firstname.' '.$student->en_lastname;
        ?>
        <h2 class="bg-primary">
            <a href="<?=base_url();?>extra_attend/index" class="btn btn-link" title="Back">
                <i class="fa fa-chevron-circle-left fa-2x" style="color: #FFF;"></i>
            </a>
            | ผลการค้นหา <small style="color: #FFF;">(Search Result)</small>
        </h2>
        <h3> <?=$th.' ('.$en.')';?> </h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>สถานที่</th>
                    <th>วัน</th>
                    <th>เวลา</th>
                    <th>ผู้อนุญาต</th>
                    <th>Manage</th>
                <tr>
            </thead>
            <tbody>
                <?php
                if (count($allschedule) > 0) {
                    $i = 0;
                    foreach ($allschedule as $schedule) {
                        $i++;
                ?>
                <tr>
                    <td>
                        <?=$i;?>
                    </td>
                    <td>
                        <?=$schedule->th_building;?><br>
                        <?=$schedule->en_building;?>
                    </td>
                    <td>
                        <?=$schedule->date;?>
                    </td>
                    <td>
                        <?=$schedule->start_time;?> - <?=$schedule->end_time;?>
                    <td>
                        <?php 
                            $th = $schedule->th_prefix.' '.$schedule->th_firstname.' '.$schedule->th_lastname;
                            $en = $schedule->en_prefix.' '.$schedule->en_firstname.' '.$schedule->en_lastname;
                            echo $th.'<br>'.$en;
                        ?>
                    </td>
                    <td>
                        <a href="<?=base_url();?>extra_attend/delete_student/<?=$schedule->STUDENT_student_id;?>/<?=$schedule->SCHEDULE_schedule_id;?>/search" class="btn btn-danger" title="Delete from this list">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                }else{
                ?>
                    <tr>
                        <td colspan="5">ไม่มีข้อมูล</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
            
    </div>
</div>
<!-- /.row -->
</body>
</html>