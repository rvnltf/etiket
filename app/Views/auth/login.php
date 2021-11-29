<?= $this->extend('auth/templates/index'); ?>
<?= $this->section('content'); ?>
<main class="form-signin">
    <div class="card" style="width:25rem;">
        <div class="card-body">
            <form class="user" action="<?= route_to('login') ?>" method="post">
                <?= csrf_field() ?>
                <h1 class="h1 mb-3 fw-bold">E-Tiket</h1>
                <h3 class="h3 mb-3 fw-normal">Silahkan Login</h3>

                <?= view('Myth\Auth\Views\_message_block') ?>
                <div class="form-floating mb-3">
                    <input type="text"
                        class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>" name="login"
                        placeholder="<?=lang('Auth.emailOrUsername')?>">
                    <label for="login"><?=lang('Auth.emailOrUsername')?></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password"
                        class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>"
                        placeholder="<?=lang('Auth.password')?>">
                    <div class="invalid-feedback">
                        <?= session('errors.password') ?>
                    </div>
                    <label for="password"><?=lang('Auth.password')?></label>
                </div>

                <button class="w-100 btn btn-lg btn-primary mb-1" type="submit"><?=lang('Auth.loginAction')?></button>
                <div class="text-center">
                    Belum punya akun? <a href="<?= route_to('register') ?>">Buat akun!</a>
                </div>
                <p class="mt-3 mb-3 text-muted">&copy; rvnltf - <?=date('Y')?></p>
            </form>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>