@extends('layouts.back')

@section('content-back')
    <?php
    $wajibIsi = '<span class="text-danger">*</span>';
    ?>
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <form id="formCreate">
                        @csrf
                        <div class="form-group">
                            <label> Nama </label>
                            <input type="text" name="name" class="form-control" placeholder="Masukan Nama">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label> Email </label>
                            <input type="text" name="email" class="form-control" placeholder="Masukan Email">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label> Password </label>
                            <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label> Confim Password </label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Masukan Password">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label> Role </label>
                            <select name="role" class="form-control">
                                <option value="" selected disabled>Pilih</option>
                                <option value="1">User</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-1"></i> Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {

            const $formCreate = $('#formCreate');
            const $formCreateSubmitBtn = $formCreate.find(`[type="submit"]`).ladda();

            $formCreate.on('submit', function(e) {
                e.preventDefault();
                clearInvalid();

                let formData = $(this).serialize();

                $formCreateSubmitBtn.ladda('start');
                ajaxSetup();

                $.ajax({
                        url: "{{ route('admin.user.store') }}",
                        data: formData,
                        method: 'post',
                        dataType: 'json'
                    })
                    .done(response => {
                        let {
                            message
                        } = response;
                        successNotification('Berhasil', message)
                        $formCreateSubmitBtn.ladda('stop');
                        reloadWindow();
                    })
                    .fail(error => {
                        const {
                            status,
                            responseJSON
                        } = error;
                        const {
                            message,
                            errors
                        } = responseJSON;

                        if (status == 422) {
                            invalidResponse($formCreate, errors);
                        }

                        $formCreateSubmitBtn.ladda('stop');
                        ajaxErrorHandling(error, $formCreate);
                    })
            })
        })
    </script>
@endsection
