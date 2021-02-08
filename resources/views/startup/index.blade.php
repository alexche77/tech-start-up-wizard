<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @forelse($startups as $startup)
            <h2>{{$startup->name}}</h2>
            <p>Features needed for MVP</p>
            @foreach($startup->features()->get()->all() as $feature)
                <p>{{$feature->name}}</p>
                @forelse($feature->positions as $position)
                    <p><b>Position:</b> {{$position->name}}</p>
                    <p><b>Candidates:</b></p>
                    <ul>
                        @if($position->pivot->usernames)
                            @forelse(\GuzzleHttp\Utils::jsonDecode($position->pivot->usernames) as $username)
                                <li>
                                    <a target="_blank"
                                       href="https://bio.torre.co/api/bios/{{$username}}">{{$username}}</a>
                                </li>
                            @empty
                                <li>No positions found yet</li>
                            @endforelse
                        @else
                            <li>No positions found yet</li>
                        @endif


                    </ul>

                @empty
                    <p>No positions have been found for this startup, try sync.</p>
                @endforelse
            @endforeach

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
