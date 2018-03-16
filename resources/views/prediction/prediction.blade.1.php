@extends('layouts.app')

@section('content')
<html>
<head>
<title>formデータ出力</title>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
</head>

<body>
<?php
$text = "HTML内でのPHPスクリプト実行処理";

echo '播種日「', date('Y/m/d', strtotime($_POST['seedingday'])),'」から100日までの日平均気温と平年値';

echo '<p>';
echo getcwd();
?>

<?php
// 読み込み用にtest.csvを開きます。
$time = array((float)2017);
$mean = array((float)10);
$max = array((float)9);
$id = array((float)1234);

$time1 = date('Y/m/d', strtotime($_POST['seedingday']));

//$fp = fopen('Temp_data.csv', 'r');
$fp = fopen('../resources/Temp_data.csv', 'r');
while (($data = fgetcsv($fp)) !== FALSE) {
	array_push($time,(string)$data[1]);
  array_push($mean,(float)$data[2]);
  array_push($max,(float)$data[3]);
  array_push($id,(float)$data[0]);
  //$time2 = date('Y/m/d', strtotime($time[2]));
  
  if ($time1 == date('Y/m/d', strtotime(end($time)))){
  $time = array((float)2017);
  $mean = array((float)10);
  $max = array((float)10);
  $id = array((float)10);
  }
}


array_shift($mean);
array_shift($max);
array_shift($time);


$mean = array_slice($mean,0,100);
$max = array_slice($max,0,100);
$time = array_slice($time,0,100);

?>

<canvas id="stage"></canvas>
</body>
<script type="text/javascript" src=”../resources/javascript.js”>
/*
var array = <?php echo json_encode($time, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
console.log(array);
var array2 = <?php echo json_encode($mean, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
console.log(array2);
var array3 = <?php echo json_encode($max, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
console.log(array3);
var ctx = document.getElementById("stage");
var myLineChart = new Chart(ctx, {
  //グラフの種類
  type: 'line',
  //データの設定
  data: {
      //データ項目のラベル
      labels: array,
      //データセット
      datasets: [{
          //凡例
          label: "日平均気温",
          //背景色
          backgroundColor: "rgba(75,192,192,0.4)",
          //枠線の色
          borderColor: "rgba(75,192,192,1)",
          
          //グラフのデータ
          data: array2
          
      },
      {
                    //凡例
          label: "平年値",
          //背景色
          backgroundColor: "rgba(175,192,192,0.4)",
          //枠線の色
          borderColor: "rgba(175,192,192,1)",
          //グラフのデータ
          data: array3
      }]
  },
  //オプションの設定
  options: {

      scales: {
          //縦軸の設定
          yAxes: [{
              ticks: {
                  //最小値を0にする
                  beginAtZero: true
                  
              },
              
              scaleLabel: {              //軸ラベル設定
                       display: true,          //表示設定
                       labelString: '気温(℃)',  //ラベル
                       fontSize: 20               //フォントサイズ
              }
          }]
      }
  }
});
*/

</script>



</body></html>

@endsection