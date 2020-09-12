@if(isset($errors) && count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach($errors->all() as $erro)
            {{$erro}}<br>
        @endforeach
    </div>
@endif

<div class="form-row form-group">
    <div class="col-md-4">
        <label class="control-label" for="hotels_has_quartos_has_categoria_id">{{__("Hotel/Room/Category")}}</label>
        <select class="form-control" name="hotels_has_quartos_has_categoria_id" id="hotels_has_quartos_has_categoria_id" required>
            <option value="">Selecione...</option>
            @foreach($hotels_has_quartos_has_categorias as $hotels_has_quartos_has_categoria)
                @if(old('hotels_has_quartos_has_categoria_id', $registro->hotels_has_quartos_has_categoria_id ?? '') == $hotels_has_quartos_has_categoria->id)
                    <option value="{{$hotels_has_quartos_has_categoria->id}}" selected>{{$hotels_has_quartos_has_categoria->hotel->nome}} / {{$hotels_has_quartos_has_categoria->quarto->nome}} / {{$hotels_has_quartos_has_categoria->categoria->nome}} - @money($hotels_has_quartos_has_categoria->valor)</option>
                @else
                    <option value="{{$hotels_has_quartos_has_categoria->id}}">{{$hotels_has_quartos_has_categoria->hotel->nome}} / {{$hotels_has_quartos_has_categoria->quarto->nome}} / {{$hotels_has_quartos_has_categoria->categoria->nome}} - @money($hotels_has_quartos_has_categoria->valor)</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-row form-group">
    <div class="col-md-4">
        <label class="control-label" for="data_inicio">{{__("Start Date")}}</label>
        <input type="date" class="form-control" id="data_inicio" name="data_inicio" placeholder="{{__("Start Date")}}"
               value="{{old('data_inicio',$registro->data_inicio ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="control-label" for="data_fim">{{__("End Date")}}</label>
        <input type="date" class="form-control" id="data_fim" name="data_fim" placeholder="{{__("End Date")}}"
               value="{{old('data_fim',$registro->data_fim ?? '') }}">
    </div>
</div>

