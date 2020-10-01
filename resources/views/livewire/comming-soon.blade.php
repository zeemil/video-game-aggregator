<div wire:init="loadCommingSoon" class="coming-soon-container space-y-10 mt-8">
    @forelse($commingSoon as $game)
        <div class="game flex">
            @if(isset($game['cover']))
                <a href="#">
                    <img src="{{ Str::replaceFirst('thumb', 'cover_small',$game['cover']['url']) }}" alt="game cover"
                         class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                </a>
            @endif
            <div class="ml-4">
                <a href="#" class="hover:text-gray-300">{{ $game['name'] }}</a>
                <div class="text-gray-400 text-sm mt-1">
                    {{ Carbon\Carbon::parse($game['first_release_date'])->format('d/m/Y') }}
                </div>
            </div>
        </div>
    @empty
        <div>Loading ...</div>
    @endforelse
</div>