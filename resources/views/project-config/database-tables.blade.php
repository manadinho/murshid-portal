<table>
    <tbody>
        @forelse($tables as $table)
            <tr>
                <td>
                    {{$table['name']}}
                </td>
                <td>
                    @forelse($table['columns'] as $column)
                        <b>{{$column['name']}}</b> {{$column['type']}} @if($column['constraints']) {{implode(', ', $column['constraints'])}} @endif <b>,</b> 
                    @empty
                    @endforelse
                </td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>