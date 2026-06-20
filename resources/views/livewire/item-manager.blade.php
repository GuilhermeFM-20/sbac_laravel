<div>
    <div class="row mb-4">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Itens</h1>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            {{ session('success') }}
        </div>
    @endif
        <div >
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registrar Itens</h3>
                    <div class="card-tools ">
                        <div class="input-group input-group-sm" style="width: 400px;">
                            <input type="text"
                                   wire:model.live="search"
                                   class="form-control mr-2"
                                   placeholder="Search item..."
                                   style="border-radius: 6px;">
                            <div class="input-group-append">
                                <a href="{{ route('items.create') }}" class="btn btn-primary" style="border-radius: 6px;">Criar Item</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">No items found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</div>
