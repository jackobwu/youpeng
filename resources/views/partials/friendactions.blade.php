@if(Auth::user()->hasFriendRequestPending($user))
    
	<p>Waiting for {{ $user->getName() }} to accept your request.</p>

@elseif(Auth::user()->hasFriendRequestReceived($user))

	<a href="{{ route('friends.accept', ['username' => $user->name]) }}" class="button is-success">
		Accept friend request
	</a>

@elseif(Auth::user()->isFriendsWith($user))

	<p>You and {{ $user->getName() }} are friends.</p>

	<form action="#" method="post">
		<input type="submit" value="Unfriend" class="button is-danger">
		@csrf
	</form>

@elseif(Auth::id() !== $user->id)

	<a href="#" class="button is-primary">
		Add as friend
	</a>

@endif