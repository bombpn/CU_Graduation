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
            รายชื่อสถานที่
            <small>Place</small>
        </h1>
        
        <a href="<?=base_url();?>place/load_add_place_page" class="btn btn-primary" title="Add">
            เพิ่มสถานที่ <i class="fa fa-plus"></i> 
        </a>
        <a href="<?=base_url();?>place/load_search_place_page" class="btn btn-success" title="Search">
            ค้นหาสถานที่ <i class="fa fa-search"></i> 
        </a>
        <?php
            if ($search == '1') {
        ?>
            <h2 class="bg-primary">
            
                <a href="<?=base_url();?>place/index" class="btn btn-link" title="Back">
                    <i class="fa fa-chevron-circle-left fa-2x" style="color: #FFF;"></i>
                </a>
                | ผลการค้นหา <small style="color: #FFF;">(Search Result)</small>
            </h2>
            
        <?php
            }
        ?>
        <!--
        <table class="table">
            <
            <tbody>
            <form action="<?=base_url();?>place/search_place" method="POST">
                <fieldset>
                <tr>
                    <td>
                        <input class="form-control" name="place_id"  placeholder="รหัสอาจารย์" value=<?=$place_id_search;?>>         
                    </td>
                    <td>
                        <input class="form-control" name="th_prefix" placeholder="คำนำหน้า" value=<?=$th_prefix_search;?>><br>
                        <input class="form-control" name="en_prefix" placeholder="Prefix" value=<?=$en_prefix_search;?>>
                    </td>
                    <td>
                        <input class="form-control" name="th_firstname" placeholder="ชื่อ" value=<?=$th_firstname_search;?>><br>
                        <input class="form-control" name="en_firstname" placeholder="Firstname" value=<?=$en_firstname_search;?>>
                    </td>
                    <td>
                        <input class="form-control" name="th_lastname" placeholder="นามสกุล" value=<?=$th_lastname_search;?>><br>
                        <input class="form-control" name="en_lastname" placeholder="Lastname" value=<?=$en_lastname_search;?>>
                    </td>
                    <td>
                        <input type="submit" class="btn btn-info" value="Search">
                        </input>
                    </td>
                </tr>
                </fieldset>
            </form>
            </tbody>
        </table>
        -->
        <table class="table table-striped">
        	<thead>
        		<tr>
                    <th>#</th>
                    <th>ชื่อสถานที่ (Place Name)</th>
                    <th>ตำแหน่ง (Location)</th>
                    <th>จำนวนที่นั่ง (#Seat)</th>
                    <th>ผังห้อง (Plan)</th>
                    <th>Manage</th>
                <tr>
        	</thead>
        	<tbody>
        		<?php
	            if (count($allplace) > 0) {
                    $i = 0;
	            	foreach ($allplace as $place) {
                        $i++;
	            ?>
                <tr>
                    <td>
                        <?=$i;?>
                    </td>
                    <td>
                        <?=$place->th_building;?><br>
                        <?=$place->en_building;?>
                    </td>
                    <td>
                        Floor: <?=$place->floor;?><br>
                        Room: <?=$place->room;?>
                    </td>
                    <td>
                        <?=$place->total_seat;?>
                    </td>
                    <td>
                        <a href="<?=base_url();?>place/download_floor_plan_file/<?=$place->floor_plan_file;?>" class="btn btn-info" title="Download">
                            <i class="fa fa-file-text-o"></i>
                        </a>
                    </td>
                    <td>
                        <a href="<?=base_url();?>place/load_edit_place_page/<?=$place->place_id;?>" class="btn btn-primary" title="Edit">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="<?=base_url();?>place/delete_place/<?=$place->place_id;?>" class="btn btn-danger" title="Delete">
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