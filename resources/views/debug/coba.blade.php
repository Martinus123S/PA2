<form action="{{route('cobalagi')}}" method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}">
@php($i = 0)
@foreach($news as $new)
    @php($values = explode(chr(2),str_replace(array(' ',','),chr(2),$new->news)))
    <table>
        <th>News</th>
        @foreach($values as $value)
        {{-- @php() --}}
        <td>
        <input type="text" name ="new[{{$i++}}]" value="{{$value}}" readonly>
        </td>
        @endforeach
    
    </table>
@endforeach

<button type="submit" name="submit">Submit</button>
</form>