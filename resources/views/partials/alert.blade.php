@if(session()->has('alert'))
	<div class="notification is-info has-text-centered">
		{{ session('alert') }}
	</div>
@endif