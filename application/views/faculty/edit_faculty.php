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
            แก้ไขรายชื่อคณะ
        </h1>
        <form action="<?=base_url();?>faculty/edit_faculty" method="POST">
                <fieldset>
                <tr>
                    <td>
                        <input class="form-control" name="faculty_id"  value="<?=$edit_faculty_temp['faculty_id'];?>" readonly>         
                    </td>
                    <td>
                        <input class="form-control" name="th_faculty_name" value="<?=$edit_faculty_temp['th_faculty_name'];?>">
                    </td>
                    <td>
                        <input class="form-control" name="en_faculty_name" value="<?=$edit_faculty_temp['en_faculty_name'];?>">
                    </td>
                    <td>
                        <input type="submit" class="btn btn-info" value="Submit">
                            <!-- <i class="fa fa-search"></i> -->
                        </input>
                    </td>
                </tr>
                </fieldset>
            </form>
        
    </div>
</div>
<!-- /.row -->
</body>
</html>