@if (Auth::check())
    <nav class="navbar navbar-light bg-light">
        <div>
            <span>{{ trans('front_lang.welcome') }}</span>
            <strong>{{ auth()->user()->name }}</strong>
        </div>
        <button class="navbar-toggler navbar-brand" id="btn_menu" type="button" >
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="bi" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
            </svg>
        </button>
    </nav>
    <nav id="sidebar">
        <ul>
            <li>Inicio</li>
            <li>Crear lista</li>
            <li>Mis listas</li>
            <li>Histórico</li>
            <li>A comprar!</li>
            <li><button id="btn_logout" class="btn btn-link">{{ trans('front_lang.logout') }}</button></li>
            <form action="logout" id="form_logout" method="POST">
                @csrf
            </form>
        </ul>
    </nav>

    <script type="text/javascript">
        $('#btn_menu').click(() => {
            let $side_bar = $('#sidebar');
            $side_bar.animate({width: 'toggle'});
        });

        $('#btn_logout').click(() => {
            $('#form_logout')[0].submit();
        });
    </script>
@endif
