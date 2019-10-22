<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') ?? $document->name }}" class="form-control">
    <div>{{ $errors->first('name') }}</div>
</div>
<div class="form-group">
    <label for="body">Body</label>
    <input type="text" name="body" value="{{ old('body') ?? $document->body }}" class="form-control">
    <div>{{ $errors->first('body') }}</div>
</div>
@csrf
