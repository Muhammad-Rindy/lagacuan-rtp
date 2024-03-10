@extends('layouts.master')

@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#181818; padding:5px 0px; color:white">⚜️ JEDERWD - KEMENANGAN PLAYER
            ⚜️
        </h6>
    </main>
    <main class="container mb-5" style="padding: 12px; border-radius:7px; background-color:#181818">
        <div class="table-responsive">
            <table class="table table-striped" id="jsonTable" style="padding: 12px 0px; width:100%">
                <thead class="">
                    <tr>
                        <th style="text-align: center">Nama Pasaran</th>
                        <th style="text-align: center">Prize 1</th>
                        <th style="text-align: center">Prize 2</th>
                        <th style="text-align: center">Prize 3</th>
                        <th style="text-align: center">Tanggal & Waktu</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </main>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                url: '/api/result',
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
                            data: 'name_pasaran',
                            render: function(data, type, row, meta) {
                                if (type === 'display') {
                                    return '<div style="text-transform:uppercase;">' +
                                        data +
                                        '</div>';
                                }
                                return data;
                            }
                        },
                        {
                            className: 'text-center',
                            data: 'result_1'
                        },
                        {
                            className: 'text-center',
                            data: 'result_2'
                        },
                        {
                            className: 'text-center',
                            data: 'result_3'
                        },
                        {
                            className: 'text-center',
                            data: 'created_at'
                        },
                    ]
                });
            }
        });
    </script>
@endsection
