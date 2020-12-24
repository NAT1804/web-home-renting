<?php 
	require_once("district.php");

	if(!empty($_POST['cityId'])) {
		$district = new District();
		$result = $district->showDistricts($_POST['cityId']);
		if (!empty($result)) {
			echo '<option value="">Chọn quận/huyện</option>';
			for($i=0; $i<count($result); $i++) {

				echo '<option value="'.$result[$i]['district_id'].'">'.$result[$i]['district_name'].'</option>';
			}
		} else {
			echo '<option value="">Chọn quận/huyện</option>';
		}
	}
?>
 