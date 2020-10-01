<div wire:init="loadMostAnticipated" class="most-anticipated-container space-y-10 mt-8">
    @forelse($mostAnticipated as $game)
        <div class="game flex">
            <a href="#">
                @if(isset($game['cover']))
                    <img src="{{ Str::replaceFirst('thumb', 'cover_small',$game['cover']['url']) }}" alt="game cover"
                         class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                @endif
            </a>
            <div class="ml-4">
                <a href="#" class="hover:text-gray-300">{{$game['name']}}</a>
                <div class="text-gray-400 text-sm mt-1">
                    {{ Carbon\Carbon::parse($game['first_release_date'])->format('d/m/Y') }}
                </div>
            </div>
        </div>
    @empty
        @foreach(range(1,4) as $game)
            <div class="game flex">
                <div class="bg-gray-800 w-16 h-24"></div>
                <div class="ml-4">
                    <div class="text-transparent text-lg bg-gray-700 rounded">Game name</div>
                    <div class="inline-block text-transparent text-lg bg-gray-700 rounded text-sm mt-1">
                      Date
                    </div>
                </div>
            </div>
        @endforeach
    @endforelse
</div>