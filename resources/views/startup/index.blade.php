<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @forelse($startups as $startup)
            <h2>{{$startup->name}}</h2>
            <form method="POST"
                  action="{{ route('startup_sync', $startup) }}">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <button
                    class="px-1 text-indigo-600 hover:text-indigo-900">
                    Sync
                </button>
            </form>
        @empty
            <h2>No startus created so far</h2>
        @endforelse
    </div>
</x-app-layout>
