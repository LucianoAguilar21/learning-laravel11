<x-app-layout>
   
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Chirp') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="{{route('chirps.update',$chirp)}}" method="POST">
                            @csrf @method('PUT')
                            <textarea class="bg-transparent block w-full rounded-md shadow-sm" cols="30" rows="10"
                                        name="message" id=""
                                        placeholder="{{__('¿What\'s on your mind?')}}">{{old('msg',$chirp->message)}}
                            </textarea>
                            <x-input-error :messages="$errors->get('msg')"/>
                            <x-primary-button class="mt-4">Edit Chirp</x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>