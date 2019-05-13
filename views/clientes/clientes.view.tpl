<div class="container">
  <div class="row ">
    <div class="col-12" style="padding-top:100px;">
        
        <h1 class="text-red">Listado de Clientes</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Edad</th>
                        <th>
                            <a class="btn btn-sm bg-red text-white mr-2" 
                            href="index.php?page=cliente&clicod=0&mode=INS" role="button">Nuevo Cliente</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{foreach clientes}}
                    <tr>
                        <td>{{cliente_id}}</td>
                        <td>{{cliente_nombre}}</td>
                        <td>{{cliente_telefono}}</td>
                        <td>{{cliente_edad}}</td>
                        <td class="center">
                            <a href="index.php?page=cliente&clicod={{cliente_id}}&mode=UPD" 
                            class="btn"><i class="fa fa-edit"></i></a>
                            <a href="index.php?page=cliente&clicod={{cliente_id}}&mode=DSP" 
                            class="btn"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    {{endfor clientes}}
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>