<div class="form-group py-3 py-3">
    <label for="input-title">Title</label>
    <input type="text" class="form-control" class="@error('title') is-invalid @enderror" id="input-post-title" name="title"
    value="{{ request()->routeIs('admin.posts.edit') ? $post->title : '' }}">
    <small id="titleHint" class="form-text text-muted">
        Insert here your post's title
    </small>
    @error('title')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group py-3 py-3">
    <label for="input-category">Category</label>
    <select type="text" class="form-control" id="input-category" name="category_id">
        <option value="">No category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                @isset($post->category)
                {{ $category->id === $post->category->id ? 'selected' : '' }}
                @endisset
                >
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    @error('category')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group py-3 py-3">
    <label for="input-tags">Tags:</label>
    @foreach ($tags as $tag)
        <div class="form-check form-switch">
            <input
            type="checkbox"
            name="tags[]"
            class="form-check-input"
            id="input-tags"
            value="{{ $tag->id }}"
            {{ $post->tags->contains($tag) ? 'checked' : '' }}>
            <label class="form-check-label" for="input-tags">
                {{ $tag->name }}
            </label>
        </div>
     @endforeach

    @error('tags')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>




<div class="form-group py-3">
    <label for="input-post-content">Post content</label>
    <textarea class="form-control"  class="@error('title') is-invalid @enderror" name="post_content" id="input-post-content" cols="30" rows="8">
        {{ request()->routeIs('admin.posts.edit') ? $post->post_content : '' }}
    </textarea>
    @error('post_content')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror


</div>

{{-- <div class="form-group py-3">
    <label for="input-post-image">Image for your post</label>
    <input type="text" class="form-control"  class="@error('title') is-invalid @enderror" name="post_image" id="input-post-image"
    value="{{ request()->routeIs('admin.posts.edit') ? $post->post_image : '' }}">
    @error('post_image')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror

</div> --}}

<div class="form-group py-3">
    <label for="input-image-url">Upload image for your post</label>
    <input type="file" class="form-control"  name="post_image" id="input-image-url">
    @error('post_image')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror

</div>



