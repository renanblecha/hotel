@if(isset($errors) && count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach($errors->all() as $erro)
            {{$erro}}<br>
        @endforeach
    </div>
@endif

{{--<div class="form-row form-group">--}}
{{--  <div class="col-md-4">--}}
{{--    <label class="control-label" for="identificacao">CPF</label>--}}
{{--    <input type="text"class="form-control" name="identificacao" id="identificacao" placeholder="Número de Identificação: CPF, RG, etc.." value="{{old('identificacao',$registro->identificacao ?? '') }}">--}}
{{--  </div>--}}
{{--</div>--}}

<div class="form-row form-group">
    <div class="col-md-4">
        <label class="control-label" for="nome">{{__("Name")}}</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="{{__("Name")}}"
               value="{{old('name',$registro->name ?? '') }}">
    </div>
</div>

<div class="form-row form-group">
    <div class="col-md-4">
        <label class="control-label">E-mail</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="E-mail"
               value="{{old('email',$registro->email ?? '') }}">
    </div>

    {{--  <div class="col-md-4">--}}
    {{--    <label class="control-label">Telefone</label>--}}
    {{--    <input type="text"class="form-control" name="telefone" id="telefone" placeholder="Telefone ou celular" value="{{old('telefone',$registro->telefone ?? '') }}">--}}
    {{--  </div>--}}
</div>

{{--<div class="form-row form-group">--}}
{{--  <div class="col-md-4">--}}
{{--    <label class="control-label">Data de Nascimento</label>--}}
{{--    <input type="text" class="datepicker form-control" name="nascimento_decorator"  placeholder="Data de nascimento" value="{{old('nascimento_decorator',$registro->nascimento_decorator ?? '') }}">--}}
{{--  </div>--}}
{{--</div>--}}


@if (isset($roles))
    <div class="form-group row">
        <div class="col-md-4">
            <label for="roles" class="control-label">{{ __('RolesList') }}</label>
            <select id="roles" name="roles[]" class="form-control" name="roles">
                @foreach($roles as $x=>$x_value)
                    <option
                        value="{{$x}}" {{ !isset($registro->roles) ? '' : (array_key_exists($registro->roles,$x) ? 'selected' : '') }}>
                        {{$x_value}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
@endif

<div class="form-group row">
    <div class="col-md-4">
        <label for="password" class="control-label">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
               name="password" required autocomplete="new-password">
        <p id="passwordHelpBlock" class="form-text text-muted">
            @lang('messages.requires_strong_password')
        </p>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-md-4">
        <label for="password-confirm" class="control-label">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
               autocomplete="new-password">
    </div>
</div>

