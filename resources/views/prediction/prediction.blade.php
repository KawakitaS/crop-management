@extends('layouts.app')

@section('content')
<html>
<head>
<title>formデータ出力</title>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
</head>

<body>

<?php
// 読み込み用にtest.csvを開きます。
$time = array((float)2017);
$mean = array((float)10);
$max = array((float)9);
$id = array((float)1234);
$precipitation = array((float)1234);
$precipitation_ave = array((float)1234);

$time1 = date('Y/m/d', strtotime($_POST['seedingday']));

//$fp = fopen('Temp_data.csv', 'r');
$fp = fopen('../resources/csv/Temp_data.csv', 'r');
while (($data = fgetcsv($fp)) !== FALSE) {
	array_push($time,(string)$data[1]);
  array_push($mean,(float)$data[2]);
  array_push($max,(float)$data[3]);
  array_push($id,(float)$data[0]);
  array_push($precipitation,(float)$data[8]);
  array_push($precipitation_ave,(float)$data[9]);
  //$time2 = date('Y/m/d', strtotime($time[2]));
  
  if ($time1 == date('Y/m/d', strtotime(end($time)))){
  $time = array((float)2017);
  $mean = array((float)10);
  $max = array((float)10);
  $id = array((float)10);
  $precipitation = array((float)10);
  $precipitation_ave = array((float)10);
  }
}


array_shift($mean);
array_shift($max);
array_shift($time);

$mean = array_slice($mean,0,100);
$max = array_slice($max,0,100);
$time = array_slice($time,0,100);
$precipitation = array_slice($precipitation,0,100);
$precipitation_ave = array_slice($precipitation_ave,0,100);


$text = "HTML内でのPHPスクリプト実行処理";

echo '播種日「', date('Y/m/d', strtotime($_POST['seedingday'])),'」から',count($mean),'日間までの日平均気温と平年値';
echo '<p>';
echo '作目:',$_POST['crop'];
echo '<p>';
echo'品種:',$_POST['cultivar'];
//echo getcwd();
echo '<p>';

?>




<body>
  
播種日以降の日平均気温推移
<canvas id="stage"></canvas>
播種日以降の日降水量推移
<canvas id="stage2"></canvas>

<script>
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
</script>


<script>
var array = <?php echo json_encode($time, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
console.log(array);
var array2 = <?php echo json_encode($precipitation, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
console.log(array2);
var array3 = <?php echo json_encode($precipitation_ave, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
console.log(array3);
var ctx = document.getElementById("stage2");
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
          label: "日降水量",
          //背景色
          backgroundColor: "rgba(75,92,192,0.4)",
          //枠線の色
          borderColor: "rgba(75,92,192,1)",
          
          //グラフのデータ
          data: array2
          
      },
      {
                    //凡例
          label: "平年値",
          //背景色
          backgroundColor: "rgba(75,192,192,0.4)",
          //枠線の色
          borderColor: "rgba(75,192,192,1)",
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
                       labelString: '降水量(mm)',  //ラベル
                       fontSize: 20               //フォントサイズ
              }
          }]
      }
  }
});
</script>



</body></html>

@endsection