@extends('layout.template')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-300">
    <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md">
      <div class="font-bold self-center text-xl sm:text-2xl uppercase text-gray-800">Add Your Activity</div>
      <div class="mt-10">
        <form action="{{ route('activity.store') }}" method="POST">
            @csrf
          <div class="flex flex-col mb-4">
            <label for="name" class="mb-1 text-[12px] sm:text-[16px] font-semibold tracking-wide text-gray-600">Name Activity</label>
            <div class="relative">
              <input id="name" type="text" name="name" value="{{ old('name') }}" class="text-[12px] sm:text-[16px] placeholder-gray-500 pl-2 py-2 rounded-lg border border-gray-400 w-full focus:outline-none focus:border-blue-400" placeholder="Name your activity"/>
            </div>
          </div>
          <div class="flex flex-col mb-4">
            <label for="type" class="mb-1 text-[12px] sm:text-[16px] font-semibold tracking-wide text-gray-600">Type Activity</label>
            <div class="relative">
              <select id="type" name="type" class="text-[12px] sm:text-[16px] placeholder-gray-500 px-2 py-2 rounded-lg border border-gray-400 w-full focus:outline-none focus:border-blue-400">
                <option disabled selected>Select a type</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>
                <option value="once in a while">Once in a while</option>
                <option value="only once">Only once</option>
              </select>
            </div>
          </div>
          <div class="flex flex-col mb-4">
            <span for="status" class="mb-1 text-[12px] sm:text-[16px] font-semibold tracking-wide text-gray-600">Status</span>
            <div class="flex gap-2">
              <!-- Active -->
              <div class="w-1/2">
                  <input type="radio" name="status" value="1" id="active" class="peer hidden" @checked(old('status') == 1)>
                  <label 
                      for="active" 
                      class="text-gray-600 py-2 cursor-pointer text-center rounded-lg border border-gray-400 block 
                      bg-gray-100 
                      peer-checked:bg-indigo-600 peer-checked:text-white">
                      <h4 class="mb-1 text-[12px] sm:text-[16px] font-semibold tracking-wide">Active</h4>
                  </label>
              </div>
          
              <!-- Inactive -->
              <div class="w-1/2">
                  <input type="radio" name="status" value="0" id="inactive" class="peer hidden" @checked(old('status') == 0)>
                  <label 
                      for="inactive" 
                      class="text-gray-600 py-2 cursor-pointer text-center rounded-lg border border-gray-400 block 
                      bg-gray-100 
                      peer-checked:bg-indigo-600 peer-checked:text-white">
                      <h4 class="mb-1 text-[12px] sm:text-[16px] font-semibold tracking-wide">Inactive</h4>
                  </label>
              </div>
          </div>
          </div>
          <div class="flex flex-col mb-4">
            <label for="time" class="mb-1 text-[12px] sm:text-[16px] font-semibold tracking-wide text-gray-600">Time</label>
            <div class="w-full flex justify-between items-center gap-4">
              <input class="text-[12px] sm:text-[16px] placeholder-gray-500 pl-2 py-2 rounded-lg border border-gray-400 w-1/2 focus:outline-none focus:border-blue-400 resize-none px-2" type="time" name="time_start" id="time-start">
              <span class="text-[12px] sm:text-[16px] font-semibold tracking-wide text-gray-600">to</span>
              <input class="text-[12px] sm:text-[16px] placeholder-gray-500 pl-2 py-2 rounded-lg border border-gray-400 w-1/2 focus:outline-none focus:border-blue-400 resize-none px-2" type="time" name="time_end" id="time-end">
            </div>
          </div>
          <div class="flex flex-col mb-4">
            <label for="description" class="mb-1 text-[12px] sm:text-[16px] font-semibold tracking-wide text-gray-600">Description (optional)</label>
            <div class="relative">
              <textarea id="description" name="description" value="{{ old('description') }}" class="text-[12px] sm:text-[16px] placeholder-gray-500 pl-2 py-2 rounded-lg border border-gray-400 w-full focus:outline-none focus:border-blue-400 resize-none" placeholder="Description for you activity"></textarea>
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
              <span class="mr-2 uppercase">Create</span>
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