@if(isset($errors) && count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach($errors->all() as $erro)
            {{$erro}}<br>
        @endforeach
    </div>
@endif

<div class="form-row form-group">
    <div class="col-md-4">
        <label class="control-label" for="quarto_id">{{__("Room")}}</label>
        <select class="form-control" name="quarto_id" id="quarto_id" required>
            <option value="">Selecione...</option>
            @foreach($quartos as $quarto)
                @if(old('quarto_id', $registro->quarto_id ?? '') == $quarto->id)
                    <option value="{{$quarto->id}}" selected>{{$quarto->nome}}</option>
                @else
                    <option value="{{$quarto->id}}">{{$quarto->nome}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-row form-group">
    <div class="col-md-4">
        <label class="control-label" for="categoria_id">{{__("Category")}}</label>
        <select class="form-control" name="categoria_id" id="categoria_id" required>
            <option value="">Selecione...</option>
            @foreach($categorias as $categoria)
                @if(old('categoria_id', $registro->categoria_id ?? '') == $categoria->id)
                    <option value="{{$categoria->id}}" selected>{{$categoria->nome}}</option>
                @else
                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-row form-group">
    <div class="col-md-4">
        <label class="control-label" for="quantidade">{{__("Quantity")}}</label>
        <input type="number" class="form-control" name="quantidade" id="quantidade" placeholder="{{__("Quantity")}}"
               value="{{old('quantidade',$registro->quantidade ?? '') }}">
    </div>
</div>

<div class="form-row form-group">
    <div class="col-md-4">
        <label class="control-label" for="valor">{{__("Price")}}</label>
        <input type="number" class="form-control" name="valor" id="valor" step=".01" placeholder="{{__("Price")}}"
               value="{{old('valor',$registro->valor ?? '') }}">
    </div>
</div>

