@if ($errors->any())
    <div class="bg-red-100 text-red-500 grid gap-4 p-5 rounded-lg z-50 fixed bottom-4 end-4">
        @foreach ($errors->all() as $error)
            <p class="font-medium">{{ $error }}</p>
        @endforeach
    </div>
@endif

@if(session('success'))
    <div class="bg-green-100 text-green-500 p-5 rounded-lg z-50 fixed bottom-4 end-4">
        <p class="font-medium">{{ session('success') }}</p>
    </div>
@endif