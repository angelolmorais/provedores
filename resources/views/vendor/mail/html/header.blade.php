@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://pjdev.sigoei.org.br/images/OEI.png" class="logo" alt="{{ __('messages.organization') }}">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
