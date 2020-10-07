<div class="game flex">
    <a href="#">
        @if(isset($game['cover']))
            <img src="{{ $game['coverImageUrl'] }}" alt="game cover"
                 class="w-16 hover:opacity-75 transition ease-in-out duration-150">
        @endif
    </a>
    <div class="ml-4">
        <a href="#" class="hover:text-gray-300">{{$game['name']}}</a>
        <div class="text-gray-400 text-sm mt-1">
            {{ $game['first_release_date'] }}
        </div>
    </div>
</div>