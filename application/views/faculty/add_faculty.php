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
            เพิ่มรายชื่อคณะ
        </h1>
        <form action="<?=base_url();?>faculty/add_faculty" method="POST">
                <fieldset>
                <tr>
                    <td>
                        <input class="form-control" name="faculty_id"  placeholder="รหัสคณะ">         
                    </td>
                    <td>
                        <input class="form-control" name="th_faculty_name" placeholder="ชื่อคณะ">  
                    </td>
                    <td>
                        <input class="form-control" name="en_faculty_name" placeholder="Faculty Name">
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