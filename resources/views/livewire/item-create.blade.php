@extends('layouts.admin')

@section('page-title', 'Registrar Item')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Novo Item</h3>
            <div class="card-tools">
                <a href="{{ route('items') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left mr-1"></i> Voltar
                </a>
            </div>
        </div>

        <form method="POST" action="{{ route('items.store') }}">
            @csrf
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Título <span class="text-danger">*</span></label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}"
                                   class="form-control @error('title') is-invalid @enderror"
                                   placeholder="Título do item">
                            @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="author">Autor</label>
                            <input type="text" id="author" name="author" value="{{ old('author') }}"
                                   class="form-control @error('author') is-invalid @enderror"
                                   placeholder="Nome do autor">
                            @error('author') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tomb_id">Tombamento</label>
                            <input type="text" id="tomb_id" name="tomb_id" value="{{ old('tomb_id') }}"
                                   class="form-control @error('tomb_id') is-invalid @enderror"
                                   placeholder="">
                            @error('tomb_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="publisher">Editora</label>
                            <input type="text" id="publisher" name="publisher" value="{{ old('publisher') }}"
                                   class="form-control @error('publisher') is-invalid @enderror"
                                   placeholder="Nome da editora">
                            @error('publisher') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="publication_year">Ano de Publicação</label>
                            <input type="number" id="publication_year" name="publication_year"
                                   value="{{ old('publication_year') }}"
                                   class="form-control @error('publication_year') is-invalid @enderror"
                                   placeholder="Ex: 2023" min="1000" max="{{ date('Y') }}">
                            @error('publication_year') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <input type="text" id="category" name="category" value="{{ old('category') }}"
                                   class="form-control @error('category') is-invalid @enderror"
                                   placeholder="Ex: Ficção, Ciência, etc.">
                            @error('category') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="shelf_location">Localização na Prateleira</label>
                            <input type="text" id="shelf_location" name="shelf_location"
                                   value="{{ old('shelf_location') }}"
                                   class="form-control @error('shelf_location') is-invalid @enderror"
                                   placeholder="Ex: A-12">
                            @error('shelf_location') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="quantity">Quantidade Total <span class="text-danger">*</span></label>
                            <input type="number" id="quantity" name="quantity" value="{{ old('quantity', 1) }}"
                                   class="form-control @error('quantity') is-invalid @enderror"
                                   min="0">
                            @error('quantity') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="available_quantity">Quantidade Disponível <span class="text-danger">*</span></label>
                            <input type="number" id="available_quantity" name="available_quantity"
                                   value="{{ old('available_quantity', 1) }}"
                                   class="form-control @error('available_quantity') is-invalid @enderror"
                                   min="0">
                            @error('available_quantity') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select id="status" name="status"
                                    class="form-control @error('status') is-invalid @enderror">
                                <option value="available" {{ old('status', 'available') === 'available' ? 'selected' : '' }}>Disponível</option>
                                <option value="unavailable" {{ old('status') === 'unavailable' ? 'selected' : '' }}>Indisponível</option>
                                <option value="maintenance" {{ old('status') === 'maintenance' ? 'selected' : '' }}>Em Manutenção</option>
                            </select>
                            @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea id="description" name="description" rows="4"
                              class="form-control @error('description') is-invalid @enderror"
                              placeholder="Descrição do item...">{{ old('description') }}</textarea>
                    @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i> Salvar Item
                </button>
                <a href="{{ route('items') }}" class="btn btn-secondary ml-2">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
