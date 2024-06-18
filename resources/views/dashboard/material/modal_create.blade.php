<!-- Modal -->
<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    <i class="fas fa-plus"></i>
                    Tambah Material
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('store.material') }}" method="POST">
                @csrf
                <input type="text" name="checklist_id" value="{{ $checklist->id }}" hidden>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Material</label>
                        <input type="text" class="form-control form-control @error('material') is-invalid @enderror"
                            name="material" value="{{ old('material') }}">
                    </div>
                    <div class="form-group">
                        <label>Ex</label>
                        <input type="text" class="form-control form-control @error('ex') is-invalid @enderror"
                            name="ex" value="{{ old('ex') }}">
                    </div>
                    <div class="form-group">
                        <label>Volume</label>
                        <input type="number" class="form-control form-control @error('volume') is-invalid @enderror"
                            name="volume" value="{{ old('volume') }}">
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" class="form-control form-control @error('satuan') is-invalid @enderror"
                            name="satuan" value="{{ old('satuan') }}">
                    </div>
                    <div class="form-group">
                        <label>kelengkapan</label>
                        <select class="form-control @error('kelengkapan') is-invalid @enderror" name="kelengkapan">
                            <option value="ada" {{ old('kelengkapan') == 'ada' ? 'selected' : '' }}>Ada</option>
                            <option value="tidak ada" {{ old('kelengkapan') == 'tidak ada' ? 'selected' : '' }}>Tidak
                                Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text"
                            class="form-control form-control @error('keterangan') is-invalid @enderror"
                            name="keterangan" value="{{ old('keterangan') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
