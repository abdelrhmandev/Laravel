<!--begin::Table-->
{{ $dataTable->table() }}
<!--end::Table-->

{{-- Inject Scripts --}}
@section('scripts')
    {{ $dataTable->scripts() }}

    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            LaravelDataTables['system-log-table'].on('click', '[data-destroy]', function (e) {
                e.preventDefault();
                if (!confirm("{{ __('Are you sure to delete this record?') }}")) {
                    return;
                }

                $.ajax({
                    url: $(this).data('destroy'),
                    type: 'DELETE',
                    dataType: 'JSON',
                    data: {
                        '_method': 'DELETE',
                    },
                    complete: function () {
                        LaravelDataTables['system-log-table'].ajax.reload();
                    },
                });
            });
        });
    </script>
@endsection
