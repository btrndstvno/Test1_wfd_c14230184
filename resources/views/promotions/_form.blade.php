<div class="mb-3">
    <label for="title" class="form-label">Judul</label>
    <input type="text" name="title" id="title" class="form-control"
        value="{{ old('title', $promotion->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Deskripsi</label>
    <textarea name="description" id="description" rows="4" class="form-control" required>{{ old('description', $promotion->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="image" class="form-label">Gambar</label>
    <input type="file" name="image" id="image" class="form-control">
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
