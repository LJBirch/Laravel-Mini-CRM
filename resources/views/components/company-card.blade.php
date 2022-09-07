@props('companies')

<ul>
    @unless(count($companies) == 0)
        @foreach($companies as $company)
        <li>{{$company->name}}</li>
        @endforeach
    @else
        <p>No listings found.</p>
    @endunless
</ul>
