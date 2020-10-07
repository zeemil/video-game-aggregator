<div wire:init="loadCommingSoon" class="coming-soon-container space-y-10 mt-8">
    @forelse($commingSoon as $game)
        <x-game-card-small :game="$game" />
    @empty
        @foreach(range(1,3) as $game)
            <x-game-card-small-skeleton />
        @endforeach
    @endforelse
</div>