@if (@isset($details['product']))
  <tr>
    <td><img src="/{{ $details['product']['image_path'] }}" alt="{{ $details['product']['name'] }}" height="40" width="40"></td>
    <td>{{ $details['product']['name'] }}</td>
    <td>{{ $details['quantity'] }}</td>
    <td>{{ $details['unit_price'] }}</td>
    <td>{{ $details['total'] }}</td>
    <td>{{ $details['status'] }}</td>
  </tr>
@endif
