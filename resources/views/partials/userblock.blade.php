<div class="media">
	<a href="{{ route('profile.index', ['username' => $user->name]) }}" class="media-left">
	<p class="image is-64x64"> <img src="{{ $user->getAvatarUrl() }}" alt="profile image"></p>
	</a>
	<div class="media-content">
		<div class="content">
			<h4><a href="{{ route('profile.index', ['username' => $user->name]) }}">{{ $user->getName() }}</a></h4>
			@if($user->location)
				<p>{{ $user->location }}</p>
			@endif
		</div>
	</div>
</div>