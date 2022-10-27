<html>
<head>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css">
<link href="styles/style.css" rel="stylesheet" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"></script>
<title>ai咒語寫入</title>
</head>
<body>
<h1>ai咒語寫入</h1>
<form action="imgdata_add.php" method="post" enctype="multipart/form-data">
  <p>標題</p>
  <input type="text" name='img_name'>
  <p>Prompt</p>
  <textarea rows="5"cols="40" style='resize:none;' name='Prompt'></textarea>
  <p>Negative</p>
  <textarea rows="5"cols="40" style='resize:none;' name='Negative'></textarea>
  <p>圖片高度</p>
  <input type="number" min=512 value=512 name='img_h'>
  <p>圖片寬度</p>
  <input type="number" min=512 value=512 name='img_w'>
  <p>steps</p>
  <input type="number" min=1 value=200 name='steps'>
  <p>scale</p>
  <input type="number" min=1 value=100 name='scale'>
  <p>model</p>
  <input type="text" name='model'>
  <p>program</p>
  <input type="text" name='program'>
  <p>Sampling_method</p>
  <input type="text" name='Sampling_method'>
  <p>提供者</p>
  <input type="text" name='provider'>
  <p>r</p>
  <input type="number" min=0 value=0 max=2 step=1 name='r'>
  <p>Remark</p>
  <input type="text" name='Remark'>
  <p>open<input type="checkbox" value='open' name='open'></p>
  <input type="file" name="my_file[]" multiple><br>
  <input type="submit" value='送出'>
  <input type="reset" value='重設'>
</form>
</body>
</html>