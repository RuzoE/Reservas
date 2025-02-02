@extends('layouts.app')

@section('content')
    @if($types->isEmpty())
        @include('components.alert-error', ['message' => 'DEBES CREAR TIPOS DE HABTACION PRIMERO!!'])
    @else
        <div class="card">
            <div class="card-header">
                <h3>Crear Habitación</h3>
            </div>
            <div class="card-body">
                <form class="row g-3" method="post" action="{{ route('admin.rooms.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="col-6">
                        <label class="form-label">Nombre</label>
                        <select name="room_type_id" class="form-select @error('room_type_id') is-invalid @enderror">
                            <option value="">Choose...</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" @selected(old('room_type_id') == $type->id)>
                                    {{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('room_type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label class="form-label">Total habitaciones</label>
                        <input type="number" name="total_room" value="{{ old('total_room') }}"
                               class="form-control @error('total_room') is-invalid @enderror">
                        @error('total_room')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label class="form-label">No camas</label>
                        <input type="number" name="no_beds" value="{{ old('no_beds') }}"
                               class="form-control @error('no_beds') is-invalid @enderror">
                        @error('no_beds')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label class="form-label">Precio</label>
                        <input type="number" name="price" value="{{ old('price') }}"
                               class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control @error('desc') is-invalid @enderror"
                                  name="desc">{{ old('desc') }}</textarea>
                        @error('desc')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Imagen</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" checked role="switch">
                            <label class="form-check-label">Activa/Inactiva</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection
