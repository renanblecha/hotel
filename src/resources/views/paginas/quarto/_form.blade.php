@if(isset($errors) && count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach($errors->all() as $erro)
            {{$erro}}<br>
        @endforeach
    </div>
@endif

<div class="form-row form-group">
    <div class="col-md-4">
        <label class="control-label" for="nome">{{__("Name")}}</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="{{__("Name")}}"
               value="{{old('nome',$registro->nome ?? '') }}">
    </div>
</div>

