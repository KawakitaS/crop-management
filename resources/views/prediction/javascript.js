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