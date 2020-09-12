@if(Auth::user())
    @if(Auth::user()->is_hospede)
        <div class="container menu">
            <nav class="nav nav-pills nav-justified" style="margin: 25px 0 0">
                <a class="nav-item nav-link" href="{{ route('hospede.reserva') }}" style="background-color: #ddd;color: #333;border-radius: 0;border: 1px solid #ccc;text-transform: uppercase">{{ __('Book') }}</a>
            </nav>
        </div>
    @endif
    @if(Auth::user()->is_gerente)
        <div class="container menu">
            <nav class="nav nav-pills nav-justified" style="margin: 25px 0 0">
                <a class="nav-item nav-link" href="{{ route('gerencia.hotel') }}" style="background-color: #ddd;color: #333;border-radius: 0;border: 1px solid #ccc;text-transform: uppercase">{{ __('Hotels') }}</a>
                <a class="nav-item nav-link" href="{{ route('gerencia.quarto') }}" style="background-color: #ddd;color: #333;border-radius: 0;border: 1px solid #ccc;text-transform: uppercase">{{ __('Rooms') }}</a>
                <a class="nav-item nav-link" href="{{ route('gerencia.categoria') }}" style="background-color: #ddd;color: #333;border-radius: 0;border: 1px solid #ccc;text-transform: uppercase">{{ __('Categories') }}</a>
                <a class="nav-item nav-link" href="{{ route('gerencia.reserva') }}" style="background-color: #ddd;color: #333;border-radius: 0;border: 1px solid #ccc;text-transform: uppercase">{{ __('Book') }}</a>
                <a class="nav-item nav-link" href="{{ route('gerencia.hospede') }}" style="background-color: #ddd;color: #333;border-radius: 0;border: 1px solid #ccc;text-transform: uppercase">{{ __('Guests') }}</a>
            </nav>
        </div>
    @endif
@endif
