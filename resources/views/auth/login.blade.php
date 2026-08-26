<x-layouts.app title="Login">

    <section class="flex min-h-[70vh] items-center justify-center bg-mai-ivory px-4 py-16">
        <div class="w-full max-w-sm rounded-2xl border border-mai-border bg-white p-8">
            <h1 class="text-xl font-bold text-mai-charcoal">Admin Login</h1>
            <p class="mt-1 text-sm text-mai-slate">Khusus tim internal Multi Andria Indonesia.</p>

            @if($errors->any())
                <div class="mt-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wide text-mai-slate">Email</label>
                    <input id="email" name="email" type="email" required autofocus value="{{ old('email') }}"
                        class="mt-1 w-full rounded-lg border border-mai-border px-4 py-2.5 text-sm focus:border-mai-red focus:outline-none focus:ring-1 focus:ring-mai-red">
                </div>
                <div>
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wide text-mai-slate">Password</label>
                    <input id="password" name="password" type="password" required
                        class="mt-1 w-full rounded-lg border border-mai-border px-4 py-2.5 text-sm focus:border-mai-red focus:outline-none focus:ring-1 focus:ring-mai-red">
                </div>
                <button type="submit" class="w-full rounded-lg bg-mai-red px-4 py-3 text-sm font-semibold text-white hover:bg-mai-wine">
                    Masuk
                </button>
            </form>
        </div>
    </section>

</x-layouts.app>
