<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    
<ul>
@foreach ($jobs as $job)
    <li>
        <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline">
            {{ $job['title'] }}
        </a>: <strong>${{ $job['salary'] }}</strong> per year
    </li>
@endforeach
</ul>

</x-layout>
