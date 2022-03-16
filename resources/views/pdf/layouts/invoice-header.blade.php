<header class="clearfix">
    <div class="header-company-info-sell-invoice">
        <img src="{{asset('images/logo.png')}}" alt="logo" width="200px" height="70px">
        <h3 class="name" style="line-height:15px"></h3>
        <div style="font-size:16px; line-height:20px; margin-top: -20px"></div>
        <div style="line-height:20px"></div>
        <div style="text-align: right">
            @php
            $date = new DateTime('now',new DateTimezone('Asia/Dhaka'));
            @endphp
              <i >Printing time : {{$date->format('j F,Y,g:i a')}}</i>
        </div>
    </div>
</header>
