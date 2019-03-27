<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>投票システム</title>
    <link rel="stylesheet" href="style.css">
    <script src="graph.js" defer></script>
</head>
<body>
<header>
    <h1><a href="index.php">ミニ投票システム</a></h1>
</header>
<main>
    <h1>投票結果</h1>
</main>
</body>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<div id="series" data-series="<?=h(json_encode($series))?>"></div>
<p><a href="index.php">戻る</a></p>
</html>

