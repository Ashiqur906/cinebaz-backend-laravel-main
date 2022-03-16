<!-- Required meta tags -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Cinebaz</title>
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ ($seo)? $seo->meta_title: 'Cinebaz'}}</title>
<meta name="description" content="{{ ($seo)? $seo->meta_description: null }}">
<meta name="keywords" content="{{ ($seo)? $seo->meta_keywords: null}}">
<link rel="canonical" href="{{ ($seo)? $seo->canonical_url: null}}" />
<meta property="og:site_name" content="{{ ($seo)? $seo->meta_title: null}}" />
<meta property="og:locale" content="bn_BD" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ ($seo)? $seo->meta_title: null}}" />
<meta property="og:description" content="{{ ($seo)? $seo->meta_description: null}}" />
<meta property="og:url" content="{{ ($seo)? $seo->seo_image: null}}" />
<meta property="og:image" content="{{ ($seo)? $seo->seo_image: null}}" />
<meta property="fb:pages" content="{{ null }}" />
