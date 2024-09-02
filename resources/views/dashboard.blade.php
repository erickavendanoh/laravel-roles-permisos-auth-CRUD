<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col col-md-2">
            <div class="collapse" id="menuHorizontal">
                <div class="sidebar-wrapper sidebar-theme">
                    <nav id="sidebar">
                        <div class="shadow-bottom"></div>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="#">Active</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                            </li>
                          </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col col-md-10">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        {{-- <x-welcome /> --}}
                        content
                        <h1 class="text-3xl font-bold underline">
                        Hello world!
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
