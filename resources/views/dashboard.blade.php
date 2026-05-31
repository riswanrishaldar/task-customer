<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center w-100">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Customer Dashboard
            </h2>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success mb-3">
                    {{ session('success') }}
                </div>
            @endif

            <div class="d-flex gap-2 mb-3">
                <a href="{{ route('customers.create') }}" class="btn btn-primary">Add New</a>
                <button type="button" id="editSelectedBtn" class="btn btn-warning">Edit Selected</button>
                <a href="{{ route('customer-copy.index') }}" class="btn btn-info text-white">Copy Data Screen</a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <table id="customersTable" class="table table-bordered table-striped w-100">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Phone</th>
                                <th>Postbox</th>
                                <th>Region</th>
                                <th>Company</th>
                                <th>Contact Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
    @endpush

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(function () {
                const table = $('#customersTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('dashboard.data') }}',
                    pageLength: 10,
                    lengthMenu: [10, 20, 50, 100],
                    columns: [
                        { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false },
                        { data: 'name', name: 'name' },
                        { data: 'address', name: 'address' },
                        { data: 'city', name: 'city' },
                        { data: 'phone', name: 'phone' },
                        { data: 'postbox', name: 'postbox' },
                        { data: 'region', name: 'region' },
                        { data: 'company', name: 'company' },
                        { data: 'email', name: 'email' },
                        { data: 'actions', name: 'actions', orderable: false, searchable: false }
                    ]
                });

                $('#editSelectedBtn').on('click', function () {
                    const selectedIds = [];

                    $('.customer-checkbox:checked').each(function () {
                        selectedIds.push($(this).val());
                    });

                    if (selectedIds.length === 0) {
                        alert('Please select at least one customer.');
                        return;
                    }

                    selectedIds.forEach(function (id) {
                        window.open(`/customers/${id}/edit`, '_blank');
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>