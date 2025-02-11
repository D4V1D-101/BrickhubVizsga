<div class="card bg-transparent border-0 text-center">
    <div class="card-img">
        @if($member->image!='')

        <img loading="lazy" decoding="async" src="{{ $member->image }}" alt="{{ $member->image }}" class="rounded w-100" width="300" height="332">

        @endif


        @if ($member->git_url!=''||$member->linkedin_url!='')
            <ul class="card-social list-inline">

                @if ($member->git_url!='')
                <li class="list-inline-item"><a class="github" href="{{ $member->git_url }}"><i class="fab fa-github"></i></a>
                </li>
                @endif

                @if ($member->linkedin_url!='')
                <li class="list-inline-item"><a class="linkedin" target="_blank" href="{{ $member->linkedin_url }}"><i class="fab fa-linkedin"></i></a>
                </li>
                @endif
            </ul>
        @endif

    </div>
    <div class="card-body">
        <h3>{{ $member->name }}</h3>
        <p>{{ $member->designation }}</p>
    </div>
</div>
