@if ($errors->any())
    <div class="bg-red-100 border-t-4 border-red-500 rounded-lg px-4 py-3 shadow-md max-w-3xl m-auto" role="alert">
        <div class="flex">
            <div class="mr-2">
                <i class="fas fa-exclamation-triangle text-red-500"></i>
            </div>
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500 list-disc">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
