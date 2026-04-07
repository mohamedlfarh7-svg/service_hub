
@extends('layouts.app')

@section('title', 'Create New Service')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-6">
    <div class="mb-10">
        <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Create Service</h1>
        <p class="text-blue-600 text-xs font-bold uppercase tracking-widest mt-1">Add a new professional service to your catalog</p>
    </div>

    @if($errors->any())
        <div class="mb-8 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-xl shadow-sm">
            <div class="flex items-center mb-2">
                <svg class="w-4 h-4 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-red-800 text-xs font-bold uppercase">Please fix the following errors:</span>
            </div>
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li class="text-red-700 text-[11px] font-medium uppercase">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white border border-gray-100 rounded-[24px] shadow-[0_10px_50px_rgba(0,0,0,0.04)] p-8 md:p-12">
        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <div class="space-y-2">
                <label class="text-[11px] font-bold uppercase text-gray-400 tracking-wider block ml-1">Service Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="e.g. Executive Consulting"
                       class="w-full px-6 py-4 bg-gray-50 border border-transparent rounded-xl focus:bg-white focus:border-blue-400 focus:ring-4 focus:ring-blue-500/5 outline-none transition-all text-gray-700 text-sm">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-[11px] font-bold uppercase text-gray-400 tracking-wider block ml-1">Price ($)</label>
                    <input type="number" name="price" value="{{ old('price') }}" required placeholder="0.00"
                           class="w-full px-6 py-4 bg-gray-50 border border-transparent rounded-xl focus:bg-white focus:border-blue-400 focus:ring-4 focus:ring-blue-500/5 outline-none transition-all text-gray-700 text-sm">
                </div>
                        <div class="space-y-2">
            <label class="block text-xs font-black text-gray-400 uppercase tracking-widest ml-1">Category</label>
                            <select name="category_id" required 
                                class="w-full px-5 py-4 rounded-2xl border border-gray-100 focus:border-blue-500 focus:ring-4 focus:ring-blue-50 outline-none transition-all bg-white text-gray-600 font-medium appearance-none">
                                <option value="" disabled selected>Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500 text-[10px] mt-1 ml-1 font-bold italic uppercase">{{ $message }}</p>
                            @enderror
                        </div>
            </div>

            <div class="space-y-2">
                <label class="text-[11px] font-bold uppercase text-gray-400 tracking-wider block ml-1">Service Cover Image</label>
                <div class="relative group">
                    <input type="file" name="image" 
                           class="w-full text-xs text-gray-400 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 transition-all cursor-pointer">
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[11px] font-bold uppercase text-gray-400 tracking-wider block ml-1">Description</label>
                <textarea name="description" rows="5" required placeholder="Describe what this service offers..."
                          class="w-full px-6 py-4 bg-gray-50 border border-transparent rounded-xl focus:bg-white focus:border-blue-400 focus:ring-4 focus:ring-blue-500/5 outline-none transition-all text-gray-700 text-sm leading-relaxed">{{ old('description') }}</textarea>
            </div>

            <div class="pt-4">
                <button type="submit" 
                        class="w-full bg-[#0047FF] text-white py-5 rounded-xl font-bold uppercase tracking-widest text-xs hover:bg-blue-700 hover:scale-[1.01] active:scale-[0.99] transition-all shadow-lg shadow-blue-200 flex items-center justify-center gap-2">
                    <span>Publish Service</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection