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
                                Data Arsip Dokumen
                            </h1>
                        </div>
                        <nav class="mt-4 rounded" aria-label="breadcrumb">
                            <ol class="breadcrumb px-3 py-2 rounded mb-0">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Arsip</li>
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
                        <a class="btn btn-primary lift" href="{{ route('arsip.create') }}"><i
                                data-feather="plus"></i>Tambah</a>
                        <form class="d-flex justify-content-end" action="{{ route('arsip.index') }}" method="GET">
                            <div class="input-group input-group-joined input-group-solid">
                                <input class="form-control pe-0" type="search" name="search"
                                    value="{{ request()->query('search') ?? '' }}" placeholder="Search"
                                    aria-label="Search" />
                                <div class="input-group-text"></div>
                            </div>
                            <button class="btn btn-primary" type="submit"><i data-feather="search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-sm" style="width: 100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col" class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if ($arsip->count() > 0)
                                    @foreach ($arsip as $item)
                                        <tr>
                                            <td>{{ ($arsip->currentPage() - 1) * $arsip->perPage() + $loop->iteration }}
                                            </td>
                                            <td>{{ $item->tgl_upload }}</td>
                                            <td>{{ $item->kategori }}</td>
                                           

                                            <!-- <td><a
                                                    href="{{ asset('storage/uploads/' . $item->file) }}">{{ $item->file }}</a>
                                            </td> -->
                                            <td>{{$item->file }}</td>

                                            <td>{{ $item->keterangan }}</td>
                                            <td
                                                class="d-flex justify-content-center justify-content-sm-start align-items-end">
                                                <a href="{{ route('arsip.show', $item->id) }}"
                                                    class="btn btn-primary btn-sm me-2">Download
                                                </a>
                                                <a href="{{ route('arsip.edit', $item->id) }}"
                                                    class="btn btn-info btn-sm me-2">
                                                    Edit
                                                </a>
                                                <form action="{{ route('arsip.destroy', $item->id) }}" method="POST"
                                                    class="d-flex d-sm-inline-flex align-items-center">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm me-2"
                                                        onclick="return confirm('Yakin ingin menghapus data?');">
                                                        Delete
                                                    </button>

                                                </form>
                                            </td>
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
                            {{ $arsip->links() }}
                        </div>
                        <div class="pb-4">
                            Showing {{ $arsip->firstItem() }} to {{ $arsip->lastItem() }} of
                            {{ $arsip->total() }}
                            entries
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
