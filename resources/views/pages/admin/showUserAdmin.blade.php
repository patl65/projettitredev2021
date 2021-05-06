@extends('layout.layoutAdmin')
@section('content')

<p>Nom : {{ $user->lastName }}
</p>
<p>Prénom : {{ $user->firstName }}
</p>
<p>Email : {{ $user->email }}
</p>
<p>Administrateur : {{ $user->Administrator ? '@mdo' : 'Non' }}
</p>



    
    @endsection
    