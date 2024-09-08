<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="file"></i></div>
                                Data Admin
                            </h1>
                        </div>
                        <nav class="mt-4 rounded" aria-label="breadcrumb">
                            <ol class="breadcrumb px-3 py-2 rounded mb-0">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-primary lift" href="{{ route('admin.create') }}"><i
                                data-feather="plus"></i>Tambah</a>
                        {{-- <form class="d-flex justify-content-end" action="{{ route('admin.index') }}" method="GET">
                            <div class="input-group input-group-joined input-group-solid">
                                <input class="form-control pe-0" type="search" name="search"
                                    value="{{ request()->query('search') ?? '' }}" placeholder="Search"
                                    aria-label="Search" />
                                <div class="input-group-text"></div>
                            </div>
                            <button class="btn btn-primary" type="submit"><i data-feather="search"></i></button>
                        </form> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-sm" style="width: 100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($admin->count() > 0)
                                    @foreach ($admin as $item)
                                        <tr>
                                            <td>{{ ($admin->currentPage() - 1) * $admin->perPage() + $loop->iteration }}
                                            </td>
                                            <td>{{ $item->username }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <div class="badge bg-success text-white rounded-pill">Active</div>
                                                @else
                                                    <div class="badge bg-dark text-white rounded-pill">Offline
                                                    </div>
                                                @endif
                                            </td>
                                            @if (Auth::id() === 1)
                                                <td
                                                    class="d-flex justify-content-center justify-content-sm-start align-items-center">
                                                    <a href="{{ route('admin.edit', $item->id) }}"
                                                        class="btn btn-info btn-sm me-2">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('admin.destroy', $item->id) }}"
                                                        method="POST"
                                                        class="d-flex d-sm-inline-flex align-items-center">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm me-2"
                                                            onclick="return confirm('Yakin ingin menghapus data?');">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">No data found</td>
                                    </tr>
                                @endif
                            </tbody>


                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $admin->links() }}
                        </div>
                        <div class="pb-4">
                            Showing {{ $admin->firstItem() }} to {{ $admin->lastItem() }} of
                            {{ $admin->total() }}
                            entries
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
