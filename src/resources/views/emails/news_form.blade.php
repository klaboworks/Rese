<form method="POST" action="{{ route('admin.email.confirm') }}">
    @csrf
    <input type="text" name="subject" placeholder="件名を入力" value="{{old('subject')}}">
    <textarea name="content" placeholder="本文を入力">{{old('content')}}</textarea>
    <button type="submit">確認画面へ</button>
</form>
<a href="{{route('admin.get.users')}}"><button>戻る</button></a>
