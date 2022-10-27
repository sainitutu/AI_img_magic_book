<html>
<head>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css">
<link href="styles/style.css" rel="stylesheet" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
<script type="text/javascript" charset="utf-8">
$(function(){
	lazyload();
	//$(".lazy").Lazy();
	$(".flexslider").flexslider({
		//slideshowSpeed:5000,
		animationSpeed:500,
		touch:true,
		slideshow:false
	});
})
</script>
<title>ai咒語與展示區</title>
</head>
<body>
<?php
	echo "<a name='go_up'></a>";
	echo "<h1>ai咒語與展示區</h1>";
	require_once('database.php');//載入資料庫設定
	$sql="SELECT * FROM imgshow";
	$sql_t="SELECT img_name FROM imgshow";
	
	if(isset($_GET['r']))
	{
		if($_GET['r']==1)
		{
			echo "<h2>有辦法到這，看來是個老司機呢…</h2>";
			$sql=$sql." where r=1 and open=1";
			$sql_t=$sql_t." where r=1 and open=1";
		}
		elseif($_GET['r']==2)
		{
			echo "<h2>當你注視著深淵，深淵也會注視著你…</h2>";
			$sql=$sql." where r=2 and open=1";
			$sql_t=$sql_t." where r=2 and open=1";
		}
		else
		{
			echo "<h2>歡迎來到此地，這裡記錄著本人與網上收集的咒語</h2>";
			$sql=$sql." where r=0 and open=1";
			$sql_t=$sql_t." where r=0 and open=1";
		}
	}
	else
	{
		echo "<h2>歡迎來到此地，這裡記錄著本人與網上收集的咒語</h2>";
		$sql=$sql." where r=0 and open=1";
		$sql_t=$sql_t." where r=0 and open=1";
	}
	//建立清單--
	echo "<h3>清單</h3>";
	echo "<table id='menu' style='border:3px #cccccc solid;' cellpadding='5' border='1'>";
	$result = $connection->query($sql_t);
	$i=0;
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			if($i==0)
			{
				echo "<tr>";
			}
			//echo "<td>".$row['img_name']."</td>";
			echo "<td>"."<a href='#".$row['img_name']."'>".$row['img_name']."</a>"."</td>";
			$i=$i+1;
			if($i==10)
			{
				echo "</tr>";
				$i=0;
			}
		}
	}
	echo "</table>";
	echo "<div class='fix'>";
	echo "<a href='#go_up'><img src='img/go_up.png' width='60pz' height='60px' alt='回頂端'></a>";
	echo "</div>";
	
	$result = $connection->query($sql);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo "<a name='".$row['img_name']."'></a>";
			echo "<h3>".$row['img_name']."</h3>";
			echo "<div class='flexslider' style='width:".$row['img_w']."px;height:".$row['img_h'].";'>";
			echo "<ul class='slides'>";
			foreach (glob("img/".$row['id']."/*.png") as $filename) {
				echo "<li><img class='lazyload' data-src='".$filename."' src='img/loading.jpg'></li>";
			}
			echo "</div><p class='copy'>Prompt</p>";
			echo "<textarea style='resize:none;width:".$row['img_w']."px;height:100px;' disabled>".$row['Prompt']."</textarea>";
			echo "<p class='copy'>Negative</p>";
			echo "<textarea style='resize:none;width:".$row['img_w']."px;height:100px;' disabled>".$row['Negative']."</textarea>";
			echo "<p>其他資料</p>";
			echo "<textarea style='resize:none;width:".$row['img_w']."px;height:100px;' disabled>";
			$no_d="隨意";
			if($row['steps']==0)
			{
				echo "Steps:".$no_d."、";
			}
			else
			{
				echo "Steps:".$row['steps']."、";
			}
			if($row['scale']==0)
			{
				echo "Scale:".$no_d."、";
			}
			else
			{
				echo "Scale:".$row['scale']."、";
			}
			echo "model:".$row['model']."\n";
			echo "program:".$row['program']."\n";
			echo "Sampling_method:".$row['Sampling_method']."\n";
			echo "提供者:".$row['provider']."\n";
			echo "備注：".$row['Remark'];
			echo "</textarea>";
			echo "<hr>";
		}
	}
	$connection->close();
?>
<script>
	$('.copy').on('click', function(){
		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val($(this).next().val()).select();
		document.execCommand("copy");
		$temp.remove();
		alert('copy to clipboard');
	});
</script>
</body>
</html>