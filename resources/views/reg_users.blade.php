@extends('layouts.master')
@section('title','Registrar Usuario')
@section('content')
<div class="container">
<p class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registrar Usuario</p>
<form action = "{{ url('save_user')  }}" method = "POST">
    

          <label>Cédula: 
              @if($errors->first('us_ic'))
              <p class='text-danger'>{{$errors->first('us_ic')}}</p>
              @endif
          </label>
          <br />
          <input type="text" value="{{ old('us_ic')  }}"class="form-control" name="us_ic" />
          <br />
          <label>Nombre: 
          @if($errors->first('us_name'))
              <p class='text-danger'>{{$errors->first('us_name')}}</p>
              @endif
          </label>
          <br />
          <input type="text" value="{{ old('us_name')  }}" class="form-control" name="us_name" />
          <br />
          <label>Apellido:
          @if($errors->first('us_last_name'))
              <p class='text-danger'>{{$errors->first('us_last_name')}}</p>
              @endif </label>
          <br />
          <input type="text" value="{{ old('us_last_name')  }}"class="form-control" name="us_last_name"/>
          <br />
          <label>Teléfono: 
          @if($errors->first('us_phone'))
              <p class='text-danger'>{{$errors->first('us_phone')}}</p>
              @endif
          </label>
          <br />
          <input type="text" value="{{ old('us_phone')  }}"class="form-control" name="us_phone"/>
          <br />
          <button class="btn btn-primary">Registrar</button>
          </div>

</form>
@endsection