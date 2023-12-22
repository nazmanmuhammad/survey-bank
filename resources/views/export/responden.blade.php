<table>
    <thead>
        <tr>
            <th></th>
        </tr>
	    <tr>
            @foreach($responden[0] as $key => $value)
            <th>{{ $key }}</th>
            @endforeach
    	</tr>
    </thead>
    <tbody>
        @foreach($responden as $row)
    	<tr>
        @foreach ($row as $value)
    	    <td>{{ $value }}</td>
        @endforeach
	    </tr>
        @endforeach
    </tbody>
</table>