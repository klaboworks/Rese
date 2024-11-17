<form method="POST" action="{{ route('admin.email.send') }}">
    @csrf
    <p>件名：</p>
    <p>{{ $subject }}</p>
    <input type="hidden" name="subject" value="{{ $subject }}">
    <p>本文：</p>
    <p>{{ $content }}</p>
    <input type="hidden" name="content" value="{{ $content }}">
    <button type="submit" name="back" value="back">修正する</button>
    <button type="submit">送信</button>
</form>
