@if(isset($errors) && count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach($errors->all() as $erro)
            {{$erro}}<br>
        @endforeach
    </div>
@endif

<div class="form-row form-group">
    <div class="col-md-4">
        <label class="control-label" for="identificacao">{{__("Vat Number")}}</label>
        <input type="text" class="form-control" name="identificacao" id="identificacao"
               placeholder="{{__("Vat Number")}}"
               value="{{old('identificacao',$registro->identificacao ?? '') }}">
    </div>
</div>

<div class="form-row form-group">
    <div class="col-md-4">
        <label class="control-label" for="nome">{{__("Name")}}</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="{{__("Name")}}"
               value="{{old('nome',$registro->nome ?? '') }}">
    </div>

    <div class="col-md-4">
        <label class="control-label" for="sobrenome">{{__("Last Name")}}</label>
        <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="{{__("Last Name")}}"
               value="{{old('sobrenome',$registro->sobrenome ?? '') }}">
    </div>
</div>

<div class="form-row form-group">
    <div class="col-md-4">
        <label class="control-label" for="email">{{__("Email")}}</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="{{__("Email")}}"
               value="{{old('email',$registro->email ?? '') }}">
    </div>

    <div class="col-md-4">
        <label class="control-label" for="telefone">{{__("Phone")}}</label>
        <input type="text" class="form-control" name="telefone" id="telefone" placeholder="{{__("Phone")}}"
               value="{{old('telefone',$registro->telefone ?? '') }}">
    </div>

    <div class="col-md-4">
        <label class="control-label" for="nascimento_decorator">{{__("Date of Birthday")}}</label>
        <input type="text" class="form-control" id="nascimento_decorator" name="nascimento_decorator" placeholder="{{__("Date of Birthday")}}"
               value="{{old('nascimento_decorator',$registro->nascimento_decorator ?? '') }}">
    </div>
</div>

<div class="form-row form-group">
    <div class="col-md-4">
        <label class="control-label" for="password">{{__("Password")}}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
               name="password" autocomplete="new-password">
    </div>
    <div class="col-md-4">
        <label class="control-label" for="password_confirmation">{{__("Confirm Password")}}</label>
        <input id="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror"
               name="password_confirmation" autocomplete="new-password">
    </div>
</div>
