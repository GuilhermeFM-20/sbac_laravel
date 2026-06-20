<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Item</h3>
            <div class="card-tools">
                <a href="{{ route('items') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left mr-1"></i> Voltar
                </a>
            </div>
        </div>

        <form wire:submit.prevent="update">
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
                            <label>Título <span class="text-danger">*</span></label>
                            <input type="text" wire:model="form.title"
                                   class="form-control @error('form.title') is-invalid @enderror"
                                   placeholder="Título do item">
                            @error('form.title') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Autor</label>
                            <input type="text" wire:model="form.author"
                                   class="form-control @error('form.author') is-invalid @enderror"
                                   placeholder="Nome do autor">
                            @error('form.author') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tombamento</label>
                            <input type="text" wire:model="form.tomb_id"
                                   class="form-control @error('form.tomb_id') is-invalid @enderror">
                            @error('form.tomb_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Editora</label>
                            <input type="text" wire:model="form.publisher"
                                   class="form-control @error('form.publisher') is-invalid @enderror"
                                   placeholder="Nome da editora">
                            @error('form.publisher') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Ano de Publicação</label>
                            <input type="number" wire:model="form.publication_year"
                                   class="form-control @error('form.publication_year') is-invalid @enderror"
                                   placeholder="Ex: 2023" min="1000" max="{{ date('Y') }}">
                            @error('form.publication_year') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Categoria</label>
                            <input type="text" wire:model="form.category"
                                   class="form-control @error('form.category') is-invalid @enderror"
                                   placeholder="Ex: Ficção, Ciência, etc.">
                            @error('form.category') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Localização na Prateleira</label>
                            <input type="text" wire:model="form.shelf_location"
                                   class="form-control @error('form.shelf_location') is-invalid @enderror"
                                   placeholder="Ex: A-12">
                            @error('form.shelf_location') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Quantidade Total <span class="text-danger">*</span></label>
                            <input type="number" wire:model="form.quantity"
                                   class="form-control @error('form.quantity') is-invalid @enderror"
                                   min="0">
                            @error('form.quantity') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Quantidade Disponível <span class="text-danger">*</span></label>
                            <input type="number" wire:model="form.available_quantity"
                                   class="form-control @error('form.available_quantity') is-invalid @enderror"
                                   min="0">
                            @error('form.available_quantity') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Status <span class="text-danger">*</span></label>
                            <select wire:model="form.status"
                                    class="form-control @error('form.status') is-invalid @enderror">
                                <option value="available">Disponível</option>
                                <option value="unavailable">Indisponível</option>
                                <option value="maintenance">Em Manutenção</option>
                            </select>
                            @error('form.status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Descrição</label>
                    <textarea wire:model="form.description" rows="4"
                              class="form-control @error('form.description') is-invalid @enderror"
                              placeholder="Descrição do item..."></textarea>
                    @error('form.description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                    <span wire:loading.remove><i class="fas fa-save mr-1"></i> Atualizar Item</span>
                    <span wire:loading>Salvando...</span>
                </button>
                <a href="{{ route('items') }}" class="btn btn-secondary ml-2">Cancelar</a>
            </div>
        </form>
    </div>
</div>