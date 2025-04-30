<x-layout>
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-slate-500">Sign in to your account</h1>
    </div>
    <x-card class="px-12 py-8">
        <form action="{{route('auth.store')}}" method="POST">
            @csrf

            <div class="mb-8">
                <label for="email" class="font-medium mb-2 block">E-mail</label>
                <x-text-input type="email" name="email"/>
            </div>
            <div class="mb-8">
                <label for="password" class="font-medium mb-2 block">Password</label>
                <x-text-input type="password" name="password"/>
            </div>

            <div class="mb-8 flex items-center justify-between">
                <div class="flex items-center space-x-2 font-medium">
                    <input type="checkbox" name="remember" class="rounded-sm border border-slate-400"/>
                    <label for="remember">Remember me</label>
                </div>
                <div>
                    <a href="#" class="hover:underline">Forget password?</a>
                </div>
            </div>

            <button type="submit" class="bg-slate-100 font-bold  w-full py-2 rounded-md shadow">Login</button>
        </form>
    </x-card>
</x-layout>
