<?php
	define('MB_2', 1000 * 1000 * 2);
	$dir = "uploads/";
	$avatar = $_FILES["avatar"];
	$path = $dir . basename($avatar["name"]);
	$extension = strtolower(pathinfo($path,PATHINFO_EXTENSION));
	$check = getimagesize($avatar["tmp_name"]);

	if(!$check){
		echo "đây không phải là ảnh.";
		return;
	}

	if (file_exists($path)) {
	    echo "file đã tồn tại";
	    return;
	}

	if ($avatar["size"] > MB_2) {
	    echo "ảnh phải nhỏ hơn 2 MB";
	    return;
	}

	$extensions = array("jpg", "png", "jpeg", "gif");
	if(!in_array($extension, $extensions)){
	    echo "chỉ chấp nhận JPG, JPEG, PNG & GIF.";
		return;
	}

	if (!move_uploaded_file($avatar["tmp_name"], $path)) {
		echo "upload thất bại";
		return;
	}
	echo "upload thành công: " . $path;
?>