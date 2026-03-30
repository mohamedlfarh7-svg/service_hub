<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="min-h-screen bg-gray-50 flex flex-col items-center justify-center p-4">
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Login</h1>
        <p class="text-gray-500 mt-1">Welcome back to ServiceHub</p>
    </div>

    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-sm border border-gray-100">
        <form method="POST" action="/login" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" name="email" placeholder="your@email.com" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                <input type="password" name="password" placeholder="••••••••" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center text-gray-600">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 mr-2">
                    Remember me
                </label>
                <a href="/password/reset" class="text-blue-600 font-semibold hover:underline">Forgot password?</a>
            </div>

            <button type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 rounded-xl shadow-md transition-all duration-200 active:scale-[0.98]">
                Login
            </button>
        </form>

        <div class="text-center mt-8">
            <p class="text-sm text-gray-600">
                Don't have an account? 
                <a href="/register" class="text-blue-600 font-bold hover:underline">Register</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>