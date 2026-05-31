<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Copy Customer Data
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <p class="mb-3">Click the button below to copy all records from Customer table to Customer2 table.</p>

                    <button type="button" id="copyDataBtn" class="btn btn-primary">
                        Copy Data
                    </button>

                    <div id="copyResult" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json'
            }
        });

        $('#copyDataBtn').on('click', function () {
            $('#copyResult').html('');

            $.ajax({
                url: '{{ route('customer-copy.copy') }}',
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    $('#copyResult').html(
                        `<div class="alert alert-success">${response.message} Total copied: ${response.count}</div>`
                    );
                },
                error: function (xhr, status, error) {
                    console.log('STATUS:', status);
                    console.log('ERROR:', error);
                    console.log('RESPONSE TEXT:', xhr.responseText);
                    console.log('RESPONSE JSON:', xhr.responseJSON);

                    let message = 'Copy failed.';

                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        message = xhr.responseJSON.message;
                    } else if (xhr.responseText) {
                        message = xhr.responseText;
                    }

                    $('#copyResult').html(
                        `<div class="alert alert-danger">${message}</div>`
                    );
                }
            });
        });
    });
</script>
@endpush
</x-app-layout>