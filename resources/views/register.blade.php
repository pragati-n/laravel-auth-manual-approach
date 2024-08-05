@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form id="frm_register" id="frm_register">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                    @error("name")
                        <p> {{ $message }}</p>                        
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>
                <button type="submit">Register</button>
                <div id="register_error" class=" alert alert-danger" style="display:none;">
            </form>
        </div>
    </div>
@endsection