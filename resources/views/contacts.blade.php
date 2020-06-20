<!doctype html>
<html lang="ru">
<head>
    @include('templates.head')
    <title>Offers page</title>
</head>
<body class="page_contacts">

<!--Header block for contacts -->

<div class="header_block">
    <div class="container-fluid">

        @include('components.header')

        <div class="row align-items-center pt-4 pb-3 pb-md-0">
            <div class="col flex-grow-1">
                <h1>@lang('contacts.contact')</h1>
                <span class="d-none d-md-block">@lang('contacts.contact.def')</span>
            </div>
            <div class="col flex-grow-0 d-none d-md-block">
                <div class="links_block">
                    <a href="#" class="link">Facebook</a>
                    <a href="#" class="link">Linked In</a>
                </div>
            </div>
            <div class="col flex-grow-0 d-block d-md-none">
                <div class="links_block">
                    <a href="#" class="link">Fb</a>
                    <a href="#" class="link">In</a>
                </div>
            </div>
        </div>

    </div>
</div>

<!--Main block for contacts -->

<div class="main_block">
    <div class="container-fluid">
        <div class="contacts">
            <div class="row">
                @foreach($personals as $personal)
                    <div class="col-12 col-md-6">
                        <div class="item">
                            <div class="img_block">
                                <img src="{{asset($personal->photo_path)}}" alt="" class="image img-fluid">
                            </div>
                            <div class="text_block">
                                <h2 class="title">{{$personal->full_name}}</h2>
                                <div class="position">{{$personal->department}}</div>
                                <a href="tel:+380679242626" class="link">{{$personal->phone}}</a>
                                <a href="mailto:{{$personal->email}}" class="link">{{$personal->email}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('templates.footer_block')
@include('templates.footer')
@include('templates.modals')

</body>
</html>