<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>投票システム</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1><a href="">ミニ投票システム</a></h1>
</header>
<main>
    <h1>今日は何をしますか？</h1>
    <div class="contents">
        <form action="" method="post">
            <div class="box item1" data-id="0">寝る</div>
            <div class="box item2" data-id="1">ショッピングに行く</div>
            <div class="box item3" data-id="2">勉強する</div>
            <input type="hidden" id="answer" name="answer" value="">
            <input type="hidden" name="token" value="<?= h($_SESSION['token']) ?>">
            <button type="submit" id="btn">投票する</button>
        </form>
    </div>
    <p><a href="result.php">投票結果を見る！</a></p>
</main>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    $(function () {
        'use strict';

        $('.box').on('click', function () {
            $('.box').removeClass('selected');
            $(this).addClass('selected');
            $('#answer').val($(this).data('id'));
        });
        $('#btn').on('click', function () {
            if ($('#answer').val() === '') {
                alert('選択してください');
                return false;
            }
        });
    });
</script>
</html>
