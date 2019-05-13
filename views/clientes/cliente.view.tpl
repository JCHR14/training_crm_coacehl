<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-10" style="padding-top:100px;">
        <h1 class="text-red">{{modeDesc}}</h1>
    </div>
    <div class="col-md-10 pb-4">
        {{if haserrores}}
        <ul class="alert alert-danger" style="list-style:none;">
            {{foreach errores}}
            <li>
                {{this}}
            </li>
            {{endfor errores}}
        </ul>
        {{endif haserrores}}
    </div>
    <div class="col-md-10 pb-4">
        <form action="index.php?page=cliente" method="post" autocomplete="off">
            <input type="hidden" name="mode" value="{{mode}}" />
            <input type="hidden" name="clicod" value="{{clicod}}" />
            <div class="form-group">
                <label for="">Nombre Cliente</label>
                <input type="text" class="form-control" name="txt_cliente_nombre" value="{{cliente_nombre}}"
                maxlength="100" placeholder="Ejemplo: Juan Carlos Hernandez" autofocus {{readonly}} >
            </div>
            <div class="form-group">
                <label for="">Telefono</label>
                <input type="tel" class="form-control" name="txt_cliente_telefono" {{readonly}}
                maxlength="14" placeholder="Ejemplo: 3160-3102" value="{{cliente_telefono}}">
            </div>
            <div class="form-group">
                <label for="">Edad</label>
                <input type="number" class="form-control" name="txt_cliente_edad" {{readonly}}
                 placeholder="Ejemplo: 24" value="{{cliente_edad}}">
            </div>
            <div class="form-group">
                <label for="">Dirección</label>
                <textarea name="txt_cliente_direccion" rows="3" class="form-control" {{readonly}}
                placeholder="Ejemplo: Colonia villa..." style="resize: none;" maxlength="200">{{cliente_direccion}}</textarea>
            </div>
            <hr>
            <div class="float-right">
                <a href="index.php?page=clientes" class="btn btn-secondary">Cancelar</a>
                {{ifnot readonly}}
                    <button id="btnConfirm" type="submit" class="btn bg-red text-white ml-3">Confirmar</button>
                {{endifnot readonly}}
            </div>
        </form>
    </div>
  </div>
</div>