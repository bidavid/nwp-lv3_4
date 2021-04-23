<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add user to project') }}
        </h2>
    </x-slot>

    <div class="py-12 text-center">
        <div class="inline-block sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 bg-white border-b border-gray-200">
                    <form action="/perform-assign" method="post">
                        @csrf
                        <div>
                            <x-label for="select" :value="__('Available users')"/>
                            
                            <select name="selected_user_id" id="select" class="mt-1">
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="selected_project_id" value="{{$project_id}}">
                        </div>
                        <div class="mt-5 flex items-center justify-center">
                            <button type="submit" class="bg-indigo-500 text-white uppercase p-3 py-1 rounded-lg focus:outline-none">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>