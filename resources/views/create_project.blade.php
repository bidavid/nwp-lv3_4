<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full sm:w-1/2 lg:w-1/3 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form style="padding: 20px" action="/create" method="post">
                        @csrf
                        <div class="mb-4">
                            <x-label for="name" :value="__('Name')"/>
                            <x-input type="text" class="block mt-1 w-full" id="name" placeholder="Name" name="name" required autofocus/>
                        </div>
                        <div class="mb-4">
                            <x-label for="description" :value="__('Description')"/>
                            <x-input  type="text" class="block mt-1 w-full" id="description" placeholder="Description" name="description" required autofocus/>
                        </div>
                        <div class="mb-4">
                            <x-label for="price" :value="__('Price')"/>
                            <x-input  type="number" min="100" class="block mt-1 w-full" id="price" placeholder="Price" name="price" required autofocus/>
                        </div>
                        <div class="mb-4">
                            <x-label for="start_date" :value="__('Started at')"/>
                            <x-input  type="date" class="block mt-1 w-full" id="start_date" placeholder="Started" name="started_at" required autofocus/>
                        </div>
                        <div class="mb-4">
                            <x-label for="end_date" :value="__('Finished at')"/>
                            <x-input  type="date" class="block mt-1 w-full" id="end_date" placeholder="Finished" name="finished_at" required autofocus/>
                        </div>
                        <div class="mb-4">
                            <x-label for="completed_tasks" :value="__('Completed tasks')"/>
                            <x-input  type="text" class="block mt-1 w-full" name="completed_tasks" id="completed_tasks" required autofocus/>
                        </textarea>
                        </div>
                        <div class="mb-4 flex items-center justify-center">
                            <button type="submit" class="bg-indigo-500 text-white uppercase p-3 py-1 rounded-lg focus:outline-none">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>