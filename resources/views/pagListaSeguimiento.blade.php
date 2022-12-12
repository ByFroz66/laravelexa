@extends('pagPlantilla')

@section('titulo')
  <h1 class="display-4">Pagina de Lista</h1>
@endsection

@section('seccion')

@if(session('msj'))
       <div class="alert alert-success">
           {{ session('msj')}}
    </div>
    @endif
<form action="{{ route('Estudiante.xRegistrar')}}" method="post" class="d-grid pag-2">
   @csrf
   @error('idEst')
      <div class="alert alert-danger">
           El codigo es requerido
      </div>
   @enderror
   @error('traAct')
      <div class="alert alert-danger">
           El codigo es requerido
      </div>
   @enderror
   @error('ofiAct')
      <div class="alert alert-danger">
           El codigo es requerido
      </div>
   @enderror
   @error('satEst')
      <div class="alert alert-danger">
           El codigo es requerido
      </div>
   @enderror
   @error('fecSeg')
      <div class="alert alert-danger">
           El codigo es requerido
      </div>
   @enderror
   @error('estSeg')
      <div class="alert alert-danger">
           El codigo es requerido
      </div>
   @enderror

  <input type="text" name="idEst" placeholder="Código" value="{{ old('idEst')}}" class="form-control mb-2"> 
  <input type="text" name="traAct" placeholder="Trabajo Actual" value="{{ old('traAct')}}" class="form-control mb-2">
  <input type="text" name="ofiAct" placeholder="Oficio Actual" value="{{ old('ofiAct')}}" class="form-control mb-2">
  
  <select name="satEst" class="form-control mb-2">
      <option value="">Seleccione</option>
      <option value="No esta Satisfecho">No esta Satisfecho</option>
      <option value="Regular">Regular</option>
      <option value="Bueno">Bueno</option>
      <option value="Muy Bueno">Muy Bueno</option>
  </select>
  <input type="text" name="fecSeg" placeholder="Fecha de Nacimiento" value="{{ old('ofiAct')}}" class="form-control mb-2">
  <select name="estSeg" class="form-control mb-2">
      <option value="">Seleccione</option>
      <option value="No esta Satisfecho">No esta Satisfecho</option>
      <option value="Regular">Regular</option>
      <option value="Bueno">Bueno</option>
      <option value="Muy Bueno">Muy Bueno</option>
  </select>
  <button class="btn btn-primary" type="submit">Agregar</button>
  </form>

  <hr>
  <h3>Lista</h3>
        <table class="table">
        <thead class="table-dark">
            <tr>
            <th scope="col">Id</th>
            
            <th scope="col">Trabajo Actual</th>
            
            <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
        @foreach($xUsuarios as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->idEst }}</td>
                <td>
                    <a href="{{ route('Estudiante.xDetalle',$item->id) }}">
                    {{ $item->traAct }}
                    </a>
                </td>
                  
                <td>

                    <form action="{{ route('Estudiante.xEliminar',$item->id) }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">x</button>
                    </form>

                    <a  class="btn btn-warning btn-sm" href="{{ route('Estudiante.xActualizar',$item->id) }}">
                    ...A
                    </a>
                    </td>
            </tr>

            @endforeach
        </tbody>
        </table>

//{{ $xUsuarios->links() }}    

@endsection
