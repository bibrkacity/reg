@if( count($games) == 0 )
    History is empty
@else
    <table>
        <tr>
            <th>
                Number
            </th>
            <th>
                Result
            </th>
            <th>
                Amount
            </th>
        </tr>
    @foreach($games as $game)
    <tr>
        <td>
            {{  $game->random }}
        </td>
        <td>
            {{  $game->result }}
        </td>
        <td>
            {{  $game->amount }}
        </td>
    </tr>
    @endforeach
    </table>
@endif
