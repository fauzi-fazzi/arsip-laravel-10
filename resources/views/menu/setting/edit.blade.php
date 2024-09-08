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
                                Edit admin
                            </h1>
                        </div>
                        {{-- <div class="col-12 col-xl-auto mb-3">Tambah Dokumen</div> --}}
                    </div>
                </div>
            </div>
        </header>
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col">
                    <div id="default">
                        <div class="card mb-4">
                            <div class="card-header">Isi Data</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="{{ route('admin.update', $admin->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="nama">Username</label>
                                                <input name="username" value="{{ $admin->username }}"
                                                    class="form-control" id="nama" type="text"
                                                    placeholder="" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama">Ganti Password</label>
                                                <input name="password" class="form-control" id="nama"
                                                    type="password" placeholder="" />
                                            </div>
                                            <div class="mb-1">
                                                <div class="d-flex justify-content-end">
                                                    <a class="btn btn-danger lift" href="{{ url('admin') }}">Cancel</a>
                                                    <button class="btn btn-primary lift" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
</x-layout>
