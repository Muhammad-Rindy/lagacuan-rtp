@extends('layouts.master')

@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">JEDERWD - JADWAL TOGEL
        </h6>
    </main>
    <main class="container mb-5" style="padding: 12px; border-radius:7px; background-color:#181818">
        <div class="table-responsive">
            <table class="table table-striped" id="jsonTable" style="padding: 12px 0px; width:100%">
                <thead class="">
                    <tr>
                        <th style="text-align: center">Nama Pasaran</th>
                        <th style="text-align: center">Jadwal Tutup</th>
                        <th style="text-align: center">Jadwal Undi</th>
                        <th style="text-align: center; width:10%">Situs Resmi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </main>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                url: '/api/jadwal',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    initializeDataTable(data);
                },
                error: function(error) {
                    console.log('Error: ', error);
                }
            });

            function initializeDataTable(data) {
                $('#jsonTable').DataTable({
                    data: data,
                    columns: [{

                            data: 'name_pasaran'
                        },
                        {
                            className: 'text-center',
                            data: 'jadwal_tutup',
                            render: function(data, type, row, meta) {
                                if (type === 'display') {
                                    return '<div>' + data + ' WIB' + '</div>';
                                }
                                return data;
                            }
                        },
                        {
                            className: 'text-center',
                            data: 'jadwal_undi',
                            render: function(data, type, row, meta) {
                                if (type === 'display') {
                                    return '<div>' + data + ' WIB' + '</div>';
                                }
                                return data;
                            }
                        },
                        {
                            data: 'situs_resmi',
                            className: 'text-center',
                            render: function(data, type, row, meta) {
                                if (type === 'display') {
                                    return '<a href="' + data + '" target="_blank">' +
                                        "<i class='fa-solid fa-up-right-from-square'></i>" +
                                        '</a>';
                                }
                                return data;
                            }
                        }
                    ]
                });
            }
        });
    </script>
@endsection
