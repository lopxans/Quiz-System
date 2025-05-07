<link rel="stylesheet" href="{{ asset('assets/css/signup.css') }}">

<x-user-nav>
    <x-slot name="title">User Signup</x-slot>
    <x-slot name="main">
        <div class="signup-container">
            <h2 class="signup-title">User Signup</h2>

            <form action="{{ url('user-signup') }}" method="POST" class="signup-form">
                @csrf

                {{-- Name --}}
                <div class="form-group">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" id="name" name="name" class="form-input" placeholder="Enter full name..." value="{{ old('name') }}">
                    <div style="color:red;">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="example@gmail.com" value="{{ old('email') }}">
                    <div style="color:red;">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="Create password...">
                    <div style="color:red;">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- Confirm Password --}}
                <div class="form-group">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" id="confirm_password" name="password_confirmation" class="form-input" placeholder="Confirm password...">
                    <div style="color:red;">
                        @error('password_confirmation')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- Submit Button --}}
                <button type="submit" class="submit-button">Sign Up</button>
            </form>
        </div>
    </x-slot>
</x-user-nav>
