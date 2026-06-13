<div>
    <h2 class="h4 mb-4">Blog Management</h2>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header">{{ $editingId ? 'Edit' : 'Create' }} Blog Post</div>
                <div class="card-body">
                    <form wire:submit="save" class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Title</label>
                            <input type="text" wire:model="form.title" class="form-control @error('form.title') is-invalid @enderror">
                            @error('form.title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Category</label>
                            <select wire:model="form.blog_category_id" class="form-select @error('form.blog_category_id') is-invalid @enderror">
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @error('form.blog_category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Content</label>
                            <textarea wire:model="form.content" class="form-control @error('form.content') is-invalid @enderror" rows="5"></textarea>
                            @error('form.content')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Featured Image</label>
                            <input type="file" wire:model="featured_image" class="form-control @error('featured_image') is-invalid @enderror" accept="image/*">
                            @error('featured_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            <div wire:loading wire:target="featured_image" class="form-text text-info">Uploading...</div>

                            @if($editingId && $featured_image)
                                <div class="mt-2">
                                    <img src="{{ $featured_image->temporaryUrl() }}" class="img-thumbnail" style="max-height:120px;">
                                </div>
                            @elseif($editingId)
                                @php
                                    $currentBlog = \App\Models\Blog::find($editingId);
                                @endphp
                                @if($currentBlog && $currentBlog->featured_image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $currentBlog->featured_image) }}" class="img-thumbnail" style="max-height:120px;">
                                    </div>
                                @endif
                            @elseif($featured_image)
                                <div class="mt-2">
                                    <img src="{{ $featured_image->temporaryUrl() }}" class="img-thumbnail" style="max-height:120px;">
                                </div>
                            @endif
                        </div>

                        <div class="col-12">
                            <label class="form-label">Published At</label>
                            <input type="datetime-local" wire:model="form.published_at" class="form-control">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Status</label>
                            <select wire:model="form.status" class="form-select">
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label">SEO Section</label>
                            <div class="card bg-light border-0">
                                <div class="card-body row g-2">
                                    <div class="col-12">
                                        <input type="text" wire:model="form.meta_title" class="form-control form-control-sm" placeholder="Meta Title">
                                    </div>
                                    <div class="col-12">
                                        <textarea wire:model="form.meta_description" class="form-control form-control-sm" rows="2" placeholder="Meta Description"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" wire:model="form.meta_keywords" class="form-control form-control-sm" placeholder="Meta Keywords (comma separated)">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex gap-2">
                            <button type="submit" class="btn btn-primary w-100">{{ $editingId ? 'Update' : 'Publish' }}</button>
                            @if($editingId)
                                <button type="button" wire:click="resetForm" class="btn btn-outline-secondary">Cancel</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Published</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>
                                        @if($blog->featured_image)
                                            <img src="{{ asset('storage/' . $blog->featured_image) }}" class="rounded" style="width:50px;height:40px;object-fit:cover;">
                                        @else
                                            <span class="text-muted small">No image</span>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($blog->title, 40) }}</td>
                                    <td>{{ $blog->category?->name ?? '-' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $blog->status === 'published' ? 'success' : 'secondary' }}">
                                            {{ ucfirst($blog->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $blog->published_at?->format('d M Y') ?? '-' }}</td>
                                    <td class="text-end">
                                        <button wire:click="edit({{ $blog->id }})" class="btn btn-sm btn-outline-primary">Edit</button>
                                        <button wire:click="delete({{ $blog->id }})" wire:confirm="Are you sure you want to delete this blog post?" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">{{ $blogs->links('pagination::custom-admin') }}</div>
            </div>
        </div>
    </div>
</div>
