@foreach ($events as $event)
    <div>
        <h2>{{ $event->name }}</h2>
        <p>{{ $event->description }}</p>
        <a href="{{ route('events.register', $event->id) }}">Daftar</a>
    </div>
@endforeach