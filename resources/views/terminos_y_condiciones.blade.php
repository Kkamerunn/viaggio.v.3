@extends('layouts.plantilla')

@section('title')
    Terms and conditions
@endsection

@section('header')
    <div class="row pt-3 align-items-center">
        <div class="col-12 col-sm-4 text-center">
            <!-- Left side navbar -->
            <ul class="navbar-nav ml-auto d-inline-flex flex-row">
            @auth
                <li class="nav-item">
                    <a href="/inicio" class="nav-link px-2">INICIO</a>
                </li>
                <li class="nav-item">
                    <a href="/faq" class="nav-link px-2">FAQ</a>
                </li>
                <li class="nav-item">
                    <a href="/contacto" class="nav-link px-2">CONTACTO</a>
                </li> 
            @endauth
            @guest
                <li class="nav-item">
                    <a href="/faq" class="nav-link px-2">FAQ</a>
                </li>
                <li class="nav-item">
                    <a href="/contacto" class="nav-link px-2">CONTACTO</a>
                </li>  
            @endguest
            </ul>
        </div>
        <div class="col-12 col-sm-4">
            <div class="row justify-content-center">
                <img src="/storage/viaggio.png" alt="viaggio" class="align-middle">
            </div>
        </div>
        <div class="col-12 col-sm-4 text-center">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="far fa-user-circle"></i>
                        CERRAR SESION
                    </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>   
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><i class="far fa-user-circle"></i>REGISTRATE</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="container my-4 terms-and-conditions">
        <div class="row justify-content-center pt-3">
            <div class="col-10">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam pretium justo et pellentesque ultricies. In sit amet maximus ipsum. Quisque eu diam quis velit bibendum pellentesque eu sed lectus. Fusce et facilisis nibh. Vivamus cursus, justo eu condimentum malesuada, ante nunc eleifend arcu, vel semper orci ante vulputate nisl. Pellentesque facilisis metus neque, id mollis lorem tincidunt quis. Aliquam tincidunt nulla vel ipsum lacinia blandit. Integer ligula ante, lacinia a fermentum nec, ornare id orci. Maecenas vel consectetur metus. Aenean auctor justo eu diam congue hendrerit.</p>

                <p>Sed sit amet commodo neque, consequat finibus lectus. Nam eget erat vitae ex ornare facilisis ut sit amet purus. Integer ante orci, auctor quis suscipit eu, finibus a ipsum. Morbi luctus nibh eget massa posuere, sit amet maximus neque eleifend. Vestibulum erat metus, tincidunt quis fermentum at, volutpat tempor ex. Morbi pharetra vitae felis in finibus. Morbi vel accumsan velit. Nulla facilisi. Nulla facilisi. Proin iaculis velit eget odio finibus finibus.</p>

                <p>Curabitur nec pharetra libero. Duis in varius velit, in maximus tortor. Vestibulum euismod metus in hendrerit fringilla. Aenean mollis eleifend est et pulvinar. Donec vitae nulla nec justo ultricies lobortis ac at turpis. Nam lobortis lacus sem, nec auctor turpis pharetra at. Vestibulum suscipit quis diam at pretium. Praesent eleifend justo quis est malesuada, ut dapibus velit auctor. Aliquam egestas nibh vitae turpis placerat, non laoreet leo luctus.</p>

                <p>Ut imperdiet id ligula ut hendrerit. Nam pharetra sit amet elit non scelerisque. Aliquam eleifend magna a finibus cursus. Nunc non consequat sapien, in sollicitudin erat. Maecenas dapibus, elit sit amet lacinia pharetra, ligula nunc eleifend dui, eget elementum dolor erat non dui. Donec sed lectus vel purus placerat ullamcorper eu sed lorem. Mauris vitae justo a purus sodales tincidunt. Suspendisse vehicula tortor vitae ornare mollis. Phasellus vitae mi ac orci pellentesque accumsan. Ut finibus blandit tortor, eget tincidunt sapien convallis in. Vivamus ut bibendum risus, sit amet dapibus tortor. Phasellus pretium fermentum rutrum.</p>

                <p>Morbi varius in sem ut rutrum. Duis ipsum metus, pellentesque eu arcu nec, vestibulum ultrices massa. Nunc convallis orci at mauris tempus, non mollis nulla rhoncus. Cras ex orci, imperdiet at gravida aliquam, mattis id dui. Nullam vel lacus placerat, convallis ex eu, consequat ex. Donec varius maximus sem, sed venenatis diam pretium nec. Nam vestibulum nunc id urna tincidunt, sit amet facilisis velit auctor.</p>

                <p>Etiam consequat lacus in diam dapibus ornare. Suspendisse dignissim lacus a augue volutpat, in viverra metus tempor. Integer quam dolor, lobortis in nibh at, efficitur ornare neque. Nulla cursus sodales mollis. Proin quis maximus lorem. Nulla vitae metus nisi. Praesent nec blandit turpis. Etiam vel congue quam, rutrum vulputate libero. Aenean ac enim purus.</p>

                <p>Nam porttitor mauris a congue egestas. Nunc elementum pellentesque ante id iaculis. Sed tincidunt cursus nunc. Nam in aliquam lorem, elementum volutpat eros. Nullam sapien lorem, pharetra vitae blandit non, eleifend et sapien. Vestibulum eget laoreet arcu. Aenean pretium ornare magna venenatis tempus. Aliquam fermentum vitae mauris nec ullamcorper. Donec non pulvinar metus, eu rutrum est. Suspendisse potenti. Fusce libero enim, congue et congue sit amet, imperdiet commodo elit. Etiam sit amet enim ut dolor suscipit elementum et ac ligula. Vestibulum iaculis magna ac ullamcorper vehicula. Aliquam sodales volutpat dolor ut ultrices.</p>

                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas pharetra odio neque, vel varius odio fermentum vel. Pellentesque nec sodales diam, eu eleifend dui. Praesent justo eros, rutrum vel justo in, scelerisque hendrerit nunc. Quisque ac ex nibh. Nulla commodo massa et velit blandit, non aliquam turpis lobortis. Aliquam erat volutpat. Phasellus dictum lorem dapibus tempor sagittis. Nunc tortor nisl, cursus ut odio in, aliquet scelerisque neque. Duis volutpat, purus id mollis facilisis, urna ipsum iaculis nulla, dictum porttitor ex sapien sed massa. Duis sit amet nisl sed leo scelerisque scelerisque.</p>

                <p>Nunc scelerisque at magna a cursus. Phasellus sodales mauris eu risus lacinia, in laoreet lorem tincidunt. Aliquam non sapien vitae orci fermentum laoreet. Donec sit amet commodo turpis, eu ullamcorper velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur ac nulla elementum, vehicula risus a, mattis nulla. Aliquam convallis mi aliquet convallis placerat. Nulla tristique eget orci quis posuere. Aliquam dolor nulla, lacinia et elementum vitae, aliquet eu massa. Morbi eget bibendum quam, sed pulvinar leo. Proin porttitor urna pellentesque, tristique tortor ut, congue quam.</p>

                <p>Aliquam blandit odio a dolor efficitur tristique. Morbi sit amet nisi pellentesque, faucibus velit sed, mollis purus. Duis tincidunt, odio quis molestie malesuada, sapien sapien semper nunc, in gravida metus lorem sit amet odio. In sodales mi ut enim sagittis, nec volutpat risus viverra. Sed fermentum nisi sagittis lectus fringilla egestas. Morbi lacinia elit eget tincidunt lacinia. Sed ipsum nisi, porttitor a nisl rutrum, varius finibus leo. Integer ac nisl ullamcorper, lobortis urna sit amet, tincidunt odio. Proin ac est sit amet justo commodo tempor at sodales dui. Aliquam eu elit vitae metus venenatis dignissim. Vestibulum bibendum est a neque fermentum, in efficitur purus congue. Nunc et odio a mi pulvinar sodales ut auctor velit. Fusce metus ante, eleifend eget auctor ut, blandit nec ligula. Pellentesque fringilla, metus sit amet mattis tempus, nisi lorem semper nisl, ac faucibus ipsum mi nec elit. Nam justo purus, aliquet vitae lacinia sit amet, mollis et est. Praesent fermentum sem ut dolor aliquam, non bibendum neque efficitur.</p>

                <p>Maecenas diam turpis, posuere porttitor accumsan quis, eleifend eget est. Vivamus imperdiet sapien at suscipit aliquam. Sed ac lorem ut diam venenatis pellentesque. Quisque maximus quis purus a blandit. Aliquam id vulputate ligula, sit amet vulputate justo. Duis vestibulum sollicitudin dui id suscipit. Phasellus commodo iaculis nulla, bibendum efficitur magna placerat in. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas pellentesque sodales nulla, eu vestibulum elit volutpat quis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed nec porta felis, a scelerisque est.</p>
            </div>
        </div>
    </div>
@endsection