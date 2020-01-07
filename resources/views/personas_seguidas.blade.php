@section('title')
    Personas que sigues
@endsection

@section('header')
    
@endsection

<!--Arreglar este código para que se vea-->

@section('content')
    @foreach ($peopleFollowed as $item) 
        <p>Estas siguiendo a {{ $item->user->name }}</p><br>
    @endforeach
@endsection