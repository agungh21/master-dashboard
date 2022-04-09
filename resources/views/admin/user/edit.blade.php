@extends('layouts.back')

@section('content-back')
    <?php
    $wajibIsi = '<span class="text-danger">*</span>';
    ?>
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-info">
                        Kolom bertanda {!! $wajibIsi !!} wajib diisi.
                    </div>
                    <form id="formEdit">
                        @csrf
                        <div class="form-group">
                            <label> Nama </label>
                            <input type="text" name="name" class="form-control" placeholder="Masukan Nama"
                                value="{{ $user->name }}" required>
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label> Email </label>
                            <input type="text" name="email" class="form-control" placeholder="Masukan Email"
                                value="{{ $user->email }}" required>
                            <span class="invalid-feedback"></span>
                        </div>
                        {{-- <div class="form-group">
                            <label> Password </label>
                            <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                            <span class="invalid-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label> Confim Password </label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Masukan Password">
                            <span class="invalid-feedback"></span>
                        </div> --}}
                        <div class="form-group">
                            <label> Role </label>
                            <select name="role" class="form-control" required>
                                <option value="" disabled>Pilih</option>
                                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>User</option>
                                <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit" data-style="expand-left">
                            <i class="fa fa-check"></i> Update
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

            let $form = $('#formEdit');
            let $formEditBtn = $form.find(`[type="submit"]`).ladda();

            $form.on('submit', function(e) {
                e.preventDefault();
                clearInvalid()

                let formData = $(this).serialize();

                $formEditBtn.ladda('start');
                ajaxSetup();

                $.ajax({
                        url: "{{ route('admin.user.update', $user->id) }}",
                        data: formData,
                        method: 'put',
                        dataType: 'json'
                    })
                    .done(response => {
                        let {
                            message
                        } = response;
                        successNotification('Berhasil', message)
                        $formEditBtn.ladda('stop');
                        reloadWindow()
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
                            invalidResponse($form, errors)
                        }

                        $formEditBtn.ladda('stop');
                        ajaxErrorHandling(error, $form);
                    })


            })
        })
    </script>
@endsection
