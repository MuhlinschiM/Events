<x-filament-widgets::widget>
    <x-filament::section>
        <h2>Total events: {{ $this->getData()['totalEvents'] }}</h2>

        <ul>
            @foreach($this->getData()['latestEvents'] as $event)
                <li>{{ $event->title }}</li>
            @endforeach
        </ul>
    </x-filament::section>
</x-filament-widgets::widget>
