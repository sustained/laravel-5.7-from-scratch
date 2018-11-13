@if($errors->any())

    <h2>Errors</h2>

    <p>Please correct the following errors and try again.</p>

    <ul>

    @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

    @endforeach

    </ul>

    <hr />

@endif
