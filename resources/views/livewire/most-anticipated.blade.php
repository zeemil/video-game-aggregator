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
        <div class="spinner mt-8"></div>
    @endforelse
</div>