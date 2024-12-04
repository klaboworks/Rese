<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>本日のご予約</title>
</head>

<body>
    <p>{{ $reservation->user->name }}様</p>
    <p>Reseをご利用いただきありがとうございます。</p>

    <p>ご予約当日となりましたのでお知らせいたします。</p>

    <ul>
        <li>ご予約日：{{ (new Carbon\Carbon($reservation->date))->isoFormat('Y年MM月DD日(ddd)') }}</li>
        <li>店名：{{$reservation->shop->shop_name}}</li>
        <li>お時間：{{ (new Carbon\Carbon($reservation->time))->format('H:i') }}</li>
        <li>人数：{{$reservation->number}}名様</li>
    </ul>

    <p>{{ $reservation->user->name }}様のご来店を心よりお待ちしております。</p>
</body>

</html>
