<?php
	echo "標題：".$_POST['img_name']."<br>";
	echo "Prompt:".$_POST['Prompt']."<br>";
	echo "Negative:".$_POST['Negative']."<br>";
	echo "圖高:".$_POST['img_h']."<br>";
	echo "圖寬:".$_POST['img_w']."<br>";
	echo "steps:".$_POST['steps']."<br>";
	echo "scale:".$_POST['scale']."<br>";
	echo "model:".$_POST['model']."<br>";
	echo "program:".$_POST['program']."<br>";
	echo "Sampling_method:".$_POST['Sampling_method']."<br>";
	echo "provider:".$_POST['provider']."<br>";
	echo "r:".$_POST['r']."<br>";
	echo "open:".$_POST['open']."<br>";
	echo "備注:".$_POST['Remark']."<br>";
	require_once('database.php');//載入資料庫設定
	$sql="SELECT img_name FROM imgshow where img_name='".$_POST['img_name']."'";
	$result = $connection->query($sql);
	if ($result->num_rows > 0)
	{
		echo "發現了重復標題，請改標題";
		return ;
	}
	//寫入資料庫
	$sql="INSERT INTO imgshow (img_name,Prompt,Negative,img_h,img_w,steps,scale,model,program,Sampling_method,provider,r,open,Remark) VALUES";
	$sql=$sql."('".$_POST['img_name']."','".$_POST['Prompt']."','".$_POST['Negative'];
	$sql=$sql."','".$_POST['img_h']."','".$_POST['img_w']."','".$_POST['steps']."','".$_POST['scale'];
	$sql=$sql."','".$_POST['model']."','".$_POST['program']."','".$_POST['Sampling_method'];
	$sql=$sql."','".$_POST['provider']."','".$_POST['r'];
	if(open)
	{
		$sql=$sql."','"."1";
	}
	else
	{
		$sql=$sql."','"."0";
	}
	$sql=$sql."','".$_POST['Remark']."');";
	$result = $connection->query($sql);
	//取得id
	$sql="SELECT id FROM imgshow where img_name='".$_POST['img_name']."'";
	$result = $connection->query($sql);
	$id='';
	if ($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		$id=$row['id'];
	}
	echo $id;
	//存入圖片
	# 取得上傳檔案數量
	$fileCount = count($_FILES['my_file']['name']);

	$file_path = $id;
	if(mkdir('./img/'.$file_path, 0700))
		echo "成功建立資料夾"."<br>";
	else
		echo "建立資料夾失敗"."<br>";
	$endpath='./img/'.$file_path.'/';
	for ($i = 0; $i < $fileCount; $i++) {
	  # 檢查檔案是否上傳成功
	  if ($_FILES['my_file']['error'][$i] === UPLOAD_ERR_OK){
		echo '檔案名稱: ' . $_FILES['my_file']['name'][$i] . '<br/>';
		echo '檔案類型: ' . $_FILES['my_file']['type'][$i] . '<br/>';
		echo '檔案大小: ' . ($_FILES['my_file']['size'][$i] / 1024) . ' KB<br/>';
		echo '暫存名稱: ' . $_FILES['my_file']['tmp_name'][$i] . '<br/>';

		# 檢查檔案是否已經存在
		if (file_exists('img/' . $_FILES['my_file']['name'][$i])){
		  echo '檔案已存在。<br/>';
		} else {
		  $file = $_FILES['my_file']['tmp_name'][$i];
		  $dest = $endpath.$_POST['img_name']."-".$i.".".pathinfo($_FILES['my_file']['name'][$i],PATHINFO_EXTENSION);
		  #$dest = 'upload/'.$_FILES['my_file']['name'][$i];

		  # 將檔案移至指定位置
		  move_uploaded_file($file, $dest);
		}
	  } else {
		echo '錯誤代碼：' . $_FILES['my_file']['error'] . '<br/>';
	  }
	}
?>