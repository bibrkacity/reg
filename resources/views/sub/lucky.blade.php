<p>Your number {{ $game->random }}</p>
<p>
    @if( $game->result == 0)
        You Lose
    @else
        You Win
    @endif
</p>

@if( $game->amount > 0)
    <p>Amount {{ $game->amount }}</p>
@endif
