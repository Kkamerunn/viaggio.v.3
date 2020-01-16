@section('title')
    Personas que sigues
@endsection

@section('header')
    
@endsection

<!--Arreglar este código para que se vea-->

@section('content')
    @foreach ($followers as $follower)
        
            <div class='container'>
                <div class='row'>
                    <div class='col-12 col-sm-8 mx-auto'>
                        <p>Estas siguiendo a {{ dd($follower['followed_user_name']) }}</p><br>
                    </div>
                </div>
            </div>
       
    @endforeach
@endsection