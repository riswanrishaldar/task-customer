<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Name <span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $customer->name ?? '') }}">
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Company</label>
        <input type="text" name="company" class="form-control" value="{{ old('company', $customer->company ?? '') }}">
        @error('company') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $customer->phone ?? '') }}">
        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Contact Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $customer->email ?? '') }}">
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-12">
        <label class="form-label">Address</label>
        <textarea name="address" class="form-control" rows="3">{{ old('address', $customer->address ?? '') }}</textarea>
        @error('address') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">City</label>
        <input type="text" name="city" class="form-control" value="{{ old('city', $customer->city ?? '') }}">
        @error('city') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Region</label>
        <input type="text" name="region" class="form-control" value="{{ old('region', $customer->region ?? '') }}">
        @error('region') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Postbox</label>
        <input type="text" name="postbox" class="form-control" value="{{ old('postbox', $customer->postbox ?? '') }}">
        @error('postbox') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-12 d-flex gap-2">
        <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
    </div>
</div>