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
                                        <form action="{{ route('arsip.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="nama">Tanggal Upload</label>
                                                <input name="tgl_upload" class="form-control" id="nama"
                                                    type="date" placeholder="Enter" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="category">Kategori</label>
                                                <select class="form-select" id="category" name="kategori">
                                                    <option selected hidden>Pilih Kategori</option>
                                                    <option value="301A">301A</option>
                                                    <option value="RPD">RPD</option>
                                                    <option value="Scan Awal">Scan Awal</option>
                                                    <option value="BTSU">BTSU</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama">Keterangan</label>
                                                <input name="keterangan" class="form-control" id="nama"
                                                    type="teks" placeholder="" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama">Upload File</label>
                                                <input name="file" class="form-control" id="nama" type="file"
                                                    placeholder="Enter" />
                                            </div>
                                            <div class="mb-1">
                                                <div class="d-flex justify-content-end">
                                                    <a class="btn btn-danger lift" href="{{ url('arsip') }}">Cancel</a>
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
