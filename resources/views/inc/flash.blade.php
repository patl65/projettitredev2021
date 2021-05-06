@if(session('error'))
<span style="color: red">{{ session('error') }}</span>
@endif

@if(session('success'))
<span style="color: green">{{ session('success') }}</span>
@endif