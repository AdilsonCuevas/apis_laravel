@extends('dashboard')

@section('contenido')
    <h3>Personajes</h3>
    <br/>
    <div>
        <h5>listado de personajes</h5>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">status</th>
                    <th scope="col">especie</th>
                    <th scope="col">origen</th>
                    <th scope="col">imagen</th>
                    <th scope="col">acciones</th>
                </tr>
            </thead>
            @foreach ($character as $chart)
            <tbody>
                    <tr>
                        <td>{{ $chart->id }}</td>
                        <td>{{ $chart->code }}</td>
                        <td>{{ $chart->name }}</td>
                        <td>{{ $chart->status}}</td>
                        <td>{{ $chart->species}}</td>
                        <td>{{ $chart->origin_name}}</td>
                        <td><img src="{{ $chart->image}}" style="width: 90px; height: 90px;"></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{$chart->id}}">
                                Actualizar
                            </button>
                            <form action="{{ route('destroy_character', $chart->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <input class="btn btn-danger" type="submit" value="Eliminar" />
                            </form>
                            <a class="btn btn-info" href="{{ route('detalles', $chart->id)}}">Ver Episodio</a>
                        </td>
                    </tr>
                
            </tbody>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$chart->id}}" data-backdrop="static"
                data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Actualizar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="form" action="{{ route('updateData') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="id" value="{{ $chart->id }}" style="display: none">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Code ') }}</label>
                                    <div class="col-md-6">
                                        <input value="{{ $chart->code }}" id="code" type="text" class="form-control" name="code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name ') }}</label>
                                    <div class="col-md-6">
                                        <input value="{{ $chart->name }}" id="name" type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Imagen ') }}</label>
                                    <div class="col-md-6">
                                        <input value="{{ $chart->image }}" id="image" type="text" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Estatus') }}</label>
                                    <div class="col-md-6">
                                        <input value="{{ $chart->status }}" id="status" type="text" class="form-control " name="status">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Especie ') }}</label>
                                    <div class="col-md-6">
                                        <input value="{{ $chart->species }}" id="species" type="text" class="form-control" name="species">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tipo ') }}</label>
                                    <div class="col-md-6">
                                        <input value="{{ $chart->type }}" id="type" type="text" class="form-control" name="type">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Genero ') }}</label>
                                    <div class="col-md-6">
                                        <input value="{{ $chart->gender }}" id="gender" type="text" class="form-control" name="gender">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Origen ') }}</label>
                                    <div class="col-md-6">
                                        <input value="{{ $chart->origin_name }}" id="origin_name" type="text" class="form-control" name="origin_name">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </table>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
@endsection