<section class="col-md-3 m-2">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Update Password
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

          @if (session('status') === 'password-updated')
                <h4 class="text-success mt-2">
                   Password updated successfully
                </p>
            @endif

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">Current Password</label>
            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="form-control"
                autocomplete="current-password"
                placeholder="Current Password"
            />
            @if ($errors->updatePassword->has('current_password'))
                <div class="text-danger mt-2">
                    {{ $errors->updatePassword->first('current_password') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">New Password</label>
            <input
                id="update_password_password"
                name="password"
                type="password"
                class="form-control"
                autocomplete="new-password"
                placeholder="New Password"
            />
            @if ($errors->updatePassword->has('password'))
                <div class="text-danger mt-2">
                    {{ $errors->updatePassword->first('password') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="form-control"
                autocomplete="new-password"
                placeholder="Confirm Password"
            />
            @if ($errors->updatePassword->has('password_confirmation'))
                <div class="text-danger mt-2">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</section>
