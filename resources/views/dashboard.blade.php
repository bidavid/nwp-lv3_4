<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My projects') }}
        </h2>
    </x-slot>

    @if (count($owned_projects) > 0) 
    <div class="my-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-base uppercase text-gray-800 leading-tight mb-2 ml-2">
                Owned:
            </h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div class="font-bold uppercase grid grid-cols-3 gap-3 items-center justify-items-center mb-3 md:mb-5 md:gap-5 lg:grid-cols-7 ">
                            <div>Name</div>
                            <div>Description</div>
                            <div class="hidden lg:block uppercase">Price</div>
                            <div class="hidden lg:block">Completed</div>
                            <div class="hidden lg:block">Started</div>
                            <div class="hidden lg:block">Finished</div>
                            <div>Assign</div>
                        </div>

                        <div class="col-span-full grid grid-cols-3 gap-3 items-center items-center justify-items-center md:gap-5 lg:grid-cols-7 ">
                        @foreach ($owned_projects as $project)
                            <div>{{$project->name}}</div>
                            <div>{{$project->description}}</div>
                            <div class="hidden lg:block">{{$project->price}}</div>
                            <div class="hidden lg:block">{{$project->completed_tasks}}</div>
                            <div class="hidden lg:block">{{$project->started_at}}</div>
                            <div class="hidden lg:block">{{$project->finished_at}}</div>
                            <form action="/assign-member" method="post">
                            @csrf
                                <input type="hidden" name="project_id" value="{{$project->id}}">
                                <button type="submit" class="bg-indigo-400 text-white text-bold text-xl rounded-full h-8 w-8 flex items-center justify-center focus:outline-none">+</button>
                            </form>                      
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if (count($assigned_projects) > 0) 
    <div class="my-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-base uppercase text-gray-800 leading-tight mb-2 ml-2">
                Assigned to:
            </h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div>
                    <div class="font-bold uppercase grid grid-cols-2 gap-3 items-center justify-items-center mb-3 md:mb-5 md:gap-5 lg:grid-cols-6 ">
                        <div>Name</div>
                        <div>Description</div>
                        <div class="hidden lg:block uppercase">Price</div>
                        <div class="hidden lg:block">Completed</div>
                        <div class="hidden lg:block">Started</div>
                        <div class="hidden lg:block">Finished</div>
                    </div>
                    <div class="col-span-full grid grid-cols-2 gap-3 items-center justify-items-center md:gap-5 lg:grid-cols-6 ">
                    @foreach ($assigned_projects as $project)
                        <div>{{$project->name}}</div>
                        <div>{{$project->description}}</div>
                        <div class="hidden lg:block">{{$project->price}}</div>
                        <div class="hidden lg:block">{{$project->completed_tasks}}</div>
                        <div class="hidden lg:block">{{$project->started_at}}</div>
                        <div class="hidden lg:block">{{$project->finished_at}}</div>
                    @endforeach
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>

