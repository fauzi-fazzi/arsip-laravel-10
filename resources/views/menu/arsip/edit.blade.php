<!-- resources/views/arsip/edit.blade.php -->
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
                                Edit Arsip Dokumen
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header">Edit Data Arsip</div>
                        <div class="card-body">
                            <form action="{{ route('arsip.update', $arsip->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="tgl_upload">Tanggal Upload</label>
                                    <input name="tgl_upload" value="{{ $arsip->tgl_upload }}" class="form-control"
                                        id="tgl_upload" type="date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="category">Kategori</label>
                                    <select class="form-select" id="category" name="kategori">
                                        <option value="" hidden>Pilih Kategori</option>
                                        <option {{ $arsip->kategori === '301A' ? 'selected' : '' }} value="301A">301A
                                        </option>
                                        <option {{ $arsip->kategori === 'RPD' ? 'selected' : '' }} value="RPD">RPD
                                        </option>
                                        <option {{ $arsip->kategori === 'Scan Awal' ? 'selected' : '' }}
                                            value="Scan Awal">Scan Awal</option>
                                        <option {{ $arsip->kategori === 'BTSU' ? 'selected' : '' }} value="BTSU">BTSU
                                        </option>
                                    </select>
                                </div>
                                 <div class="mb-3">
                                     <label for="nama"> Keterangan</label>
                                     <input name="keterangan" class="form-control" id="nama"
                                     type="teks" placeholder=" " />
                                 </div>
                                <div class="mb-3">
                                    <label for="file">File</label>
                                    <input type="file" name="file" class="form-control" id="file"
                                        accept=".pdf">
                                    <span
                                        class="form-text text-muted">{{ $arsip->file ? 'Current file: ' . $arsip->file : '' }}</span>

                                    <small class="form-text text-muted">| Biarkan kosong jika tidak ingin mengubah
                                        file.</small>
                                </div>

                                <div class="mb-1">
                                    <div class="d-flex justify-content-end">
                                        <a class="btn btn-danger lift" href="{{ url('arsip') }}">Batal</a>
                                        <button class="btn btn-primary lift" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
