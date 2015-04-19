

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
			ค้นหารายชื่อ
            <small>Search Student</small>
        </h1>
    <table  class="table table-hover table-bordered">
	<thread>
		<tr >
			<th>รหัสนิสิต</th>
			<th>คำนำหน้าขื่อ</th>
			<th>เบอร์โทรศัพท์</th>
			<th>ปรับแต่ง</th>
		</tr>
	</thread>
	<tbody>
	<?php 
		if (count($rs)==0)
		{
			echo "<tr><td colspan = '4' align='center'>-- no data --</td></tr>" ;
		}
		else
		{
				$no = 1;
				foreach($rs as $r)
				{
					echo "<tr>";
					echo "<td align='center'>$no</td>";
					echo "<td align='center'>".$r["member_name"]."</td>";
					echo "<td align='center'>".$r["member_tel"]."</td>";
					echo "<td >";
					echo anchor("member/edit/".$r['id'],"แก้ไข้")."&nbsp" ;
					$id = $r['id'] ;
					echo anchor("member/del/".$id,"ลบ",array(
						"onclick" => "javascript:return confirm('คุณต้องการลบหรือไม่?');"
						)) ;
					echo "<tr>";
					$no++;
				}
		}
	?>
	
	
	</tbody>
    </div>
</div>
<!-- /.row -->
</body>
</html>
