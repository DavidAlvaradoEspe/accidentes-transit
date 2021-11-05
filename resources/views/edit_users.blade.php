@extends('layouts.master')
@section('title','Editar Usuario')
@section('content')
<div class="container">
<p class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4">Editar Usuario</p>
<form action = "{{ url('save_user_changes')  }}" method = "POST">
    
            <input  name="us_id" type="hidden" value="{{$all_users->us_id}}">

          <label>Cédula: 
              @if($errors->first('us_ic'))
              <p class='text-danger'>{{$errors->first('us_ic')}}</p>
              @endif
          </label>
          <br />
          <input type="text" value="{{$all_users->us_ic}}"class="form-control" name="us_ic" placeholder="Cédula" />
          <br />
          <label>Nombre: 
          @if($errors->first('us_name'))
              <p class='text-danger'>{{$errors->first('us_name')}}</p>
              @endif
          </label>
          <br />
          <input type="text" value="{{$all_users->us_name}}" class="form-control" name="us_name" />
          <br />
          <label>Apellido:
          @if($errors->first('us_last_name'))
              <p class='text-danger'>{{$errors->first('us_last_name')}}</p>
              @endif </label>
          <br />
          <input type="text" value="{{$all_users->us_last_name}}"class="form-control" name="us_last_name"/>
          <br />
          <label>Teléfono: 
          @if($errors->first('us_phone'))
              <p class='text-danger'>{{$errors->first('us_phone')}}</p>
              @endif
          </label>
          <br />
          <input type="text" value="{{$all_users->us_phone}}"class="form-control" name="us_phone"/>
          <br />
          <button class="btn btn-primary">Actualizar</button>
          </div>

</form>
@endsection