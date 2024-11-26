<p>ユーザー総数{{ $userCount }}人</p>
<a href="{{ route('admin.email.form') }}">お知らせメール一括送信</a>
<a href="{{ route('admin.shop.index') }}">戻る</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
