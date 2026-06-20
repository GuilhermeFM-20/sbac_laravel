<div class="login-box">
    <div class="login-logo">
        <b>SBAC</b> Sistema
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Faça login para continuar</p>

            <form wire:submit="login">
                <div class="input-group mb-3">
                    <input
                        type="email"
                        wire:model="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="E-mail"
                        autofocus
                    >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input
                        type="password"
                        wire:model="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Senha"
                    >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row align-items-center mb-3">
                    <div class="col-7">
                        <div class="icheck-primary">
                            <input type="checkbox" wire:model="remember" id="remember">
                            <label for="remember">Lembrar-me</label>
                        </div>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn btn-primary btn-block" wire:loading.attr="disabled">
                            <span wire:loading.remove>Entrar</span>
                            <span wire:loading><i class="fas fa-spinner fa-spin"></i></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>