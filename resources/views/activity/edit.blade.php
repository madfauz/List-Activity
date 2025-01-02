@extends('layout.template')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-300">
    <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md">
      <div class="font-bold self-center text-xl sm:text-2xl uppercase text-gray-800">Add Your Activity</div>
      <div class="mt-10">
        <form action="{{ route('activity.update', $data_activity->id) }}" method="POST">

            @csrf
            @method('PUT')
          <div class="flex flex-col mb-4">
            <label for="name" class="mb-1 text-[12px] sm:text-[16px] font-semibold tracking-wide text-gray-600">Name Activity</label>
            <div class="relative">
              <input id="name" type="text" name="name" value="{{ $data_activity->name }}" class="text-[12px] sm:text-[16px] placeholder-gray-500 pl-2 py-2 rounded-lg border border-gray-400 w-full focus:outline-none focus:border-blue-400" placeholder="Name your activity"/>
            </div>
          </div>
          <div class="flex flex-col mb-4">
            <label for="type" class="mb-1 text-[12px] sm:text-[16px] font-semibold tracking-wide text-gray-600">Type Activity</label>
            <div class="relative">
              <select id="type" name="type" class="text-[12px] sm:text-[16px] placeholder-gray-500 px-2 py-2 rounded-lg border border-gray-400 w-full focus:outline-none focus:border-blue-400">
                <option disabled>Select a type</option>
                <option value="daily" {{ $data_activity->type == 'daily' ? 'selected' : '' }}>Daily</option>
                <option value="weekly" {{ $data_activity->type == 'weekly' ? 'selected' : '' }}>Weekly</option>
                <option value="once in a while" {{ $data_activity->type == 'once in a while' ? 'selected' : '' }}>Once in a while</option>
                <option value="only once" {{ $data_activity->type == 'only once' ? 'selected' : '' }}>Only once</option>
              </select>
            </div>
          </div>
          <div class="flex flex-col mb-4">
            <label for="description" class="mb-1 text-[12px] sm:text-[16px] font-semibold tracking-wide text-gray-600">Description (optional)</label>
            <div class="relative">
              <textarea id="description" name="description" class="text-[12px] sm:text-[16px] placeholder-gray-500 pl-2 py-2 rounded-lg border border-gray-400 w-full focus:outline-none focus:border-blue-400 resize-none" placeholder="Description for you activity">{{ $data_activity->description }}</textarea>
            </div>
          </div>

          {{-- Pesan error di posisi yang sama untuk "name" dan "type" --}}
          @if ($errors->has('name') || $errors->has('type'))
          <div class="text-red-600 mb-4">
              {{ $errors->first('name') ?? $errors->first('type') }}
          </div>
          @endif

  
          <div class="flex w-full">
            <button type="submit" class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-indigo-500 hover:bg-indigo-600 rounded py-2 w-full transition duration-300 ease-in">
              <span class="mr-2 uppercase">Update</span>
              <span>
                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>


@endsection