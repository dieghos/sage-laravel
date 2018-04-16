<div class="list-group">
  <a href="{{ route('file-details',$file) }}" class="list-group-item list-group-item-action
  flex-column align-items-start {{getStateClass($file->state)}}">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">{{ $file->code }}</h5>
      <small>{{ dateFormat($file->created_at)}}</small>
    </div>
    <p class="mb-1">{{ $file->description }}</p>
    <small>{{ $file->comments }}</small>
  </a>
</div>
