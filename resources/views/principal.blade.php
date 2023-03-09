@extends('dashboard')

@section('contenido')
    <h3>Principal</h3>
    <br/>
    <a class="btn btn-primary" href="/api/characters/list">Consumir Api</a>
    <br/>
    <div>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">status</th>
                    <th scope="col">especie</th>
                    <th scope="col">imagen</th>
                    <th scope="col">acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($responses as $mts)
                    <tr>
                        <td>1</td>
                        <td>{{ $mts['id'] }}</td>
                        <td>{{ $mts['name'] }}</td>
                        <td>{{ $mts['status'] }}</td>
                        <td>{{ $mts['species'] }}</td>
                        <td><img src="{{$mts['image']}}" style="width: 60px; height: 60px;"></td>
                        <td>
                            <form action="{{ route('save_character', $mts['id'] )}}" method="POST" id="login-form" autocomplete="off" class="mt-3">
                                @csrf
                                <input name="id" style="display: none" value="{{ $mts['id'] }}">
                                <input name="name" style="display: none" value="{{ $mts['name'] }}">
                                <input name="status" style="display: none" value="{{ $mts['status'] }}">
                                <input name="species" style="display: none" value="{{ $mts['species'] }}">
                                <input name="image" style="display: none" value="{{ $mts['image'] }}">
                                <input name="type" style="display: none" value="{{ $mts['type'] }}">
                                <input name="gender" style="display: none" value="{{ $mts['gender'] }}">
                                <input name="origin_name" style="display: none" value="{{ $mts['origin']['name'] }}">
                                <button type="submit" class="">Guardar Registro</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection