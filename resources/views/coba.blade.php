<form action="{{route('proses')}}" method="POST">
    {{ csrf_field() }}
    <input type="text" name="nama">
    <input type="text" name="username">
    <input type="text" name="email">
    <input type="text" name="no_tel">
    <input type="password" name="password">
    <button type="submit">Submit</button>
</form>