@section('title')
    Personas que sigues
@endsection

@section('header')
    
@endsection

@section('content')
    @forelse ($peopleFollowed as $item) 
        @if ($item->followed_id->user_name)
            <p>{{ $item->followed_id->user_name }}</p><br>   
        @else 
            <p>{{ $item->followed_id->name }}</p><br>
        @endif
    @empty
        <p>Actualmente no sigues a nadie, empieza a seguir <a href="/inicio">aqui</a></p>
    @endforelse
@endsection