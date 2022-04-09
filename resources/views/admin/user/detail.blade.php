@extends('layouts.back')

@section('content-back')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <table class="table" width="100%">
                        <tbody>
                            <tr>
                                <td style="border-top: none; width:35%;">Induk</td>
                                <td style="border-top: none; width:5%;"> : </td>
                                <td class="text-primary" style="border-top: none;">
                                    {{ $track->odptrack != false ? $track->odptrack->odp_name : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td style="border-top: none;">Port</td>
                                <td style="border-top: none;"> : </td>
                                <td class="text-primary" style="border-top: none;">{{ $track->port }}</td>
                            </tr>
                            <tr>
                                <td style="border-top: none;">Rasio</td>
                                <td style="border-top: none;"> : </td>
                                <td class="text-primary" style="border-top: none;">{{ $track->rasio }}</td>
                            </tr>
                            <tr>
                                <td style="border-top: none;">Warna Kabel Dari Splitter</td>
                                <td style="border-top: none;"> : </td>
                                <td class="text-primary" style="border-top: none;">
                                    {{ $track->color ? $track->color->color_name : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="border-top: none;">Status</td>
                                <td style="border-top: none;"> : </td>
                                <td class="text-primary" style="border-top: none;">{!! $track->htmlStatus() !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <p>Type : <span class="text-primary">{{ $track->type }}</span> </p>
                    <hr>
                    @if ($track->type == 'customer')
                        <table class="table" width="100%">
                            <tbody>
                                <tr>
                                    <td style="border-top: none; width:35%;">Nama</td>
                                    <td style="border-top: none; width:5%;"> : </td>
                                    <td class="text-primary" style="border-top: none;">
                                        {{ $track->customertrackone->customer_name }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <table class="table" width="100%">
                            <tbody>
                                <tr>
                                    <td style="border-top: none; width:35%;">Nama</td>
                                    <td style="border-top: none; width:5%;"> : </td>
                                    <td class="text-primary" style="border-top: none;">
                                        {{ $track->odptrackone->odp_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-top: none;">Limit</td>
                                    <td style="border-top: none;"> : </td>
                                    <td class="text-primary" style="border-top: none;">
                                        {{ $track->odptrackone->split_limit }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <p>Komentar : </p>
                    <hr>
                    <p class="text-primary">{{ $track->comment_notes }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <p>Lokasi : </p>
                    <iframe
                        src="https://maps.google.com/maps?q={{ $track->location }}&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        width="100%" height="400" frameborder="0" style="border:0" allowfullscree>
                    </iframe>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
    </script>
@endsection
