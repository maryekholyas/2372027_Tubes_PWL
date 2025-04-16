<div class="modal fade" id="detailModal-{{ $pengajuan->pengajuan_id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $pengajuan->pengajuan_id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel-{{ $pengajuan->pengajuan_id }}">Detail Pengajuan Surat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                @if ($pengajuan->detail)
                    @switch($pengajuan->jenis_surat)
                        @case('1') 
                            <p><strong>Tanggal Kelulusan:</strong> 
                                {{ date('d-m-Y', strtotime($pengajuan->detail->tanggal_kelulusan)) }}</p>
                            @break

                        @case('2') 
                            <p><strong>Nama:</strong> {{ $pengajuan->detail->nama }}</p>
                            <p><strong>NRP:</strong> {{ $pengajuan->detail->nrp }}</p>
                            <p><strong>Semester:</strong> {{ $pengajuan->detail->semester }}</p>
                            <p><strong>Alamat:</strong> {{ $pengajuan->detail->alamat }}</p>
                            <p><strong>Keperluan Pengajuan:</strong> {{ $pengajuan->detail->keperluan_pengajuan }}</p>
                            @break

                        @case('3') 
                            <p><strong>Keperluan Pembuatan LHS:</strong> {{ $pengajuan->detail->keperluan_pembuatan_lhs }}</p>
                            @break

                        @case('4') 
                            <p><strong>Nama Tujuan:</strong> {{ $pengajuan->detail->nama_tujuan }}</p>
                            <p><strong>Perusahaan Tujuan:</strong> {{ $pengajuan->detail->nama_perusahaan_tujuan }}</p>
                            <p><strong>Alamat Perusahaan:</strong> {{ $pengajuan->detail->alamat_perusahaan_tujuan }}</p>
                            <p><strong>Kode Mata Kuliah:</strong> {{ $pengajuan->detail->kode_mata_kuliah }}</p>
                            <p><strong>Semester/Tahun:</strong> {{ $pengajuan->detail->semester_tahun }}</p>
                            <p><strong>Tujuan:</strong> {{ $pengajuan->detail->tujuan }}</p>
                            <p><strong>Topik:</strong> {{ $pengajuan->detail->topik }}</p>
                            @break

                        @default
                            <p class="text-muted">Tidak ada data tambahan untuk jenis surat ini.</p>
                    @endswitch
                @else
                    <p class="text-danger">Detail surat tidak ditemukan.</p>
                @endif
            </div>
        </div>
    </div>
</div>