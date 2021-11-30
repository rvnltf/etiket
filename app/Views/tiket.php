<?= $this->extend('auth/templates/index'); ?>
<?= $this->section('content'); ?>
<main class="form-signin">
    <div class="card" style="width:35rem;">
        <div class="card-body">
            <h3 class="h3 mb-3 fw-normal">Jadwal Pemberangkatan</h3>
            <form class="user" action="<?= route_to('register') ?>" method="post">
                <?= csrf_field() ?>
                <?= view('Myth\Auth\Views\_message_block') ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-floating mb-3">
                            <input type="text"
                                class="form-control <?php if(session('errors.firstname')) : ?>is-invalid<?php endif ?>"
                                name="firstname" id="firstname" placeholder="First name"
                                value="<?= old('firstname') ?>">
                            <label for="firstname">First name</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating mb-3">
                            <input type="text" id="lastname"
                                class="form-control <?php if(session('errors.lastname')) : ?>is-invalid<?php endif ?>"
                                name="lastname" placeholder="Lastname" value="<?= old('lastname') ?>">
                            <label for="lastname">Last name</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text"
                        class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>"
                        name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>"
                        id="username">
                    <label for="Username"><?=lang('Auth.username')?></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email"
                        class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" id="email"
                        name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>"
                        value="<?= old('email') ?>">
                    <label for="email"><?=lang('Auth.email')?></label>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-floating mb-3">
                            <input type="password" name="password"
                                class="form-control  <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>"
                                placeholder="<?=lang('Auth.password')?>" autocomplete="off" id="password">
                            <label for="Password"><?=lang('Auth.password')?></label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating mb-5">
                            <input type="password" name="pass_confirm"
                                class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                            <label for="Repeat Password"><?=lang('Auth.repeatPassword')?></label>
                        </div>
                    </div>
                </div>

                <button class="w-100 btn btn-lg btn-primary mb-1" type="submit">Daftar</button>
                <div class="text-center">
                    Sudah punya aku? <a href="<?= route_to('login') ?>">Login</a>
                </div>
                <p class="mt-3 mb-2 text-muted">&copy; rvnltf - <?=date('Y')?></p>
            </form>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>