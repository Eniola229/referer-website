<section  class="col-md-5 m-2">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Profile Information
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Update your account's profile information and email address.
        </p>
    </header>


        @if (session('status') === 'profile-updated')
           <h4 class="text-success mt-2">
             
                   Profile updated successfully
               
            </p>
        @endif
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                id="name"
                name="name"
                type="text"
                class="form-control"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                placeholder="Name"
            />
            @if ($errors->has('name'))
                <div class="text-danger mt-2">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                id="email"
                name="email"
                type="email"
                class="form-control"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                placeholder="Email"
            />
            @if ($errors->has('email'))
                <div class="text-danger mt-2">
                    {{ $errors->first('email') }}
                </div>
            @endif

                <div class="mb-3">
            <label for="email" class="form-label">Phone Number</label>
            <input
                id="mobile"
                name="mobile"
                type="mobile"
                class="form-control"
                value="{{ old('mobile', $user->mobile) }}"
                required
                autocomplete="username"
                placeholder="mobile"
            />
            @if ($errors->has('mobile'))
                <div class="text-danger mt-2">
                    {{ $errors->first('mobile') }}
                </div>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-gray-800 dark:text-gray-200">
                        Your email address is unverified.
                        <button
                            form="send-verification"
                            class="btn btn-link"
                        >
                            Click here to re-send the verification email.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success">
                            A new verification link has been sent to your email address.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="mb-3">
            <button
                type="submit"
                class="btn btn-primary"
            >
                Save
            </button>
        </div>

    </form>
</section>
