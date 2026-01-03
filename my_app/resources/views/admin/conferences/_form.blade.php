<div class="mb-3">
    <label class="form-label">{{ __('app.conference.title') }}</label>
    <input type="text"
           name="title"
           class="form-control @error('title') is-invalid @enderror"
           value="{{ old('title', $conference->title ?? '') }}">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">{{ __('app.conference.description') }}</label>
    <textarea name="description"
              rows="4"
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $conference->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">{{ __('app.conference.speakers') }}</label>
    <input type="text"
           name="speakers"
           class="form-control @error('speakers') is-invalid @enderror"
           value="{{ old('speakers', $conference->speakers ?? '') }}">
    @error('speakers')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">{{ __('app.conference.date') }}</label>
        <input type="date"
               name="date"
               class="form-control @error('date') is-invalid @enderror"
               value="{{ old('date', optional($conference->date ?? null)->format('Y-m-d')) }}">
        @error('date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">{{ __('app.conference.time') }}</label>
        <input type="time"
               name="time"
               class="form-control @error('time') is-invalid @enderror"
               value="{{ old('time', is_string($conference->time ?? null) ? ($conference->time ?? '') : optional($conference->time ?? null)->format('H:i')) }}">
        @error('time')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">{{ __('app.conference.address') }}</label>
        <input type="text"
               name="address"
               class="form-control @error('address') is-invalid @enderror"
               value="{{ old('address', $conference->address ?? '') }}">
        @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">
        {{ $submitText ?? __('app.conference.save') }}
    </button>

    <a href="{{ route('admin.conferences.index') }}" class="btn btn-outline-secondary">
        {{ __('app.conference.conferences') }}
    </a>
</div>