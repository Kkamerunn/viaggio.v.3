@section('title')
    Personas que sigues
@endsection

@section('header')
    
@endsection

<!--Arreglar este código para que se vea-->

@section('content')
    @forelse ($peopleFollowed as $item)
        @if ($item->follower_id == $userLog->id)
            <p>Sigues al usuario {{ $item->seguidos->name }}</p><br>
        @endif
    @empty
        <p>Actualmente no sigues a nadie, empieza a seguir <a href="/inicio">aqui</a></p>
    @endforelse   
@endsection