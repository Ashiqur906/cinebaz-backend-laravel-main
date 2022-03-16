<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            {{ __('test.Media Information') }}
        </div>
    </div>
    <div class="iq-card-body">
        <div class="trending-info g-border">
            <div>
                @if ($sdata->featured)
                    <img src="{{ asset('storage/' . $sdata->featured->small) }}"
                        style="height:182px;float:left;padding:15px;">
                @endif
                <h1 class="trending-text big-title text-uppercase mt-0">{{ strtoupper($sdata->title_en) }} </h1>
                <ul class="p-0 list-inline d-flex align-items-center movie-content list-movie-content">
                    {{-- @dump($sdata) --}}
                    @foreach ($sdata->tags as $list)
                        <li class="text-white">
                            {{ $list->title_en }}
                        </li>
                    @endforeach

                    @foreach ($sdata->categories as $list)
                        <li class="text-white">
                            {{ $list->title_english }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="d-flex align-items-center text-white text-detail">
                @if ($sdata->age_limit)
                    <span class="badge badge-secondary p-3">{{ $sdata->age_limit }}</span>
                @endif
                <span class="trending-year">#Release : {{ $sdata->release_year }}</span>
                <span class="ml-3">#Duration : {{ $sdata->duration }}</span>
            </div>
            <!-- <div class="d-flex align-items-center series mb-4">
               <a href="javascript:void();"><img src="images/trending/trending-label.png" class="img-fluid" alt=""></a>
               <span class="text-gold ml-3">{{ $sdata->duration }}</span>
            </div> -->

            @if ($sdata->description_en)
                <p class="trending-dec w-100 mb-0">
                    {!! $sdata->description_en !!}
                </p>
            @endif
        </div>
    </div>
    <div class="iq-card-footer text-center">

    </div>
</div>
