@extends('layouts.app') 

@section('content')
<div class="max-w-6xl mx-auto py-8">
    
    <div class="flex justify-between items-center bg-evoni-pink p-4 rounded-t-lg shadow-md mb-6 border-b-4 border-evoni-pink-dark">
        <div>
            <h2 class="text-2xl font-bold text-black">Invitado</h2>
           
        </div>
        
        <a href="{{ route('guests.create') }}" class="bg-black text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-3xl shadow-lg hover:scale-110 transition-transform duration-200 hover:bg-gray-800 leading-none pb-2">
            +
        </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($guests as $guest)
            <div class="relative p-6 rounded-lg shadow-md border-l-8 transition hover:shadow-xl
                {{ $guest->genero === 'Hombre' ? 'bg-evoni-green border-evoni-green-dark' : 'bg-evoni-pink border-evoni-pink-dark' }}">
                
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <h3 class="text-xl font-extrabold text-gray-900 mb-2">{{ $guest->nombre }}</h3>
                        
                        <div class="text-sm space-y-1 text-gray-800">
                            <p class="flex items-center gap-2">
                                <span class="font-bold"> Tipo:</span> {{ $guest->tipo }}
                            </p>
                            <p class="flex items-center gap-2">
                                <span class="font-bold">Mesa:</span> {{ $guest->mesa ?? 'Sin asignar' }}
                            </p>
                            <p class="flex items-center gap-2">
                                <span class="font-bold"> Estatus:</span> 
                                <span class="px-2 py-0.5 rounded text-xs text-white font-bold uppercase tracking-wider shadow-sm
                                    {{ $guest->estatus == 'Confirmada' ? 'bg-green-600' : ($guest->estatus == 'Rechazada' ? 'bg-red-500' : 'bg-yellow-500') }}">
                                    {{ $guest->estatus }}
                                </span>
                            </p>
                            @if($guest->nota)
                                <p class="mt-2 italic text-gray-600 text-xs border-l-2 border-gray-400 pl-2">
                                    "{{ $guest->nota }}"
                                </p>
                            @endif
                        </div>
                    </div>
                                        <form action="{{ route('guests.destroy', $guest->id) }}" method="POST" class="ml-2">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" 
                                class="text-gray-400 hover:text-red-600 font-bold text-2xl leading-none p-2 rounded-full hover:bg-white/50 transition" 
                                onclick="return confirm('¿Estás seguro de borrar a {{ $guest->nombre }}?')">
                           &times;
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-1 md:col-span-2 text-center py-16 bg-white rounded-lg border-2 border-dashed border-gray-300">
                <p class="text-gray-400 text-lg mb-4">No tienes invitados registrados en este evento :< </p>
                <a href="{{ route('guests.create') }}" class="text-evoni-pink-dark font-bold text-lg hover:underline underline-offset-4">
                    Haz clic aquí para agregar el primero:D
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection