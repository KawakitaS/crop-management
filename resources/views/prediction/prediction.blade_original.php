<html>
<head>
<title>formデータ出力</title>
</head>
<body>
場所は<?php echo $_POST['place']; ?>
品種は<?php echo $_POST['cultivar']; ?>
播種時期は<?php echo $_POST['seedingday']; ?>



<?php
// 読み込み用にtest.csvを開きます。
$fp = fopen('data.csv', 'r');
while (($data = fgetcsv($fp)) !== FALSE) {
	echo '<p>';
	echo ' No.',$data[0];
	echo ' 商品名：',$data[1];
	echo ' 単価：',$data[2];	
}
fclose($fp);
?>

<?php
// 読み込み用にtest.csvを開きます。
$fp = fopen('data.csv', 'r');
while (($data = fgetcsv($fp)) !== FALSE) {
	echo '<p>';
	echo ' 0',$data[0];
	echo ' 1：',$data[1];
	echo ' 2：',$data[2];	
}
fclose($fp);
?>

<?php
$text = "HTML内でのPHPスクリプト実行処理";
echo "<p> $text </p>";
echo getcwd();
?>



</body></html>