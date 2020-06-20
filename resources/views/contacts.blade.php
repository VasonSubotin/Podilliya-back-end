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
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="img_block">
                            <img src="{{asset('build/img/contacts/contact1.jpg')}}" alt="" class="image img-fluid">
                        </div>
                        <div class="text_block">
                            <h2 class="title">Yuiry Timoschuk</h2>
                            <div class="position">Director</div>
                            <a href="tel:+380679242626" class="link">+38 (067) 924-26-26</a>
                            <a href="mailto:yuriy.timoshuk@podiliyagold.com" class="link">yuriy.timoshuk@podiliyagold.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="img_block">
                            <img src="{{asset('build/img/contacts/contact2.jpg')}}" alt="" class="image img-fluid">
                        </div>
                        <div class="text_block">
                            <h2 class="title">Volodimir Chernuha</h2>
                            <div class="position">Tech Specialist</div>
                            <a href="tel:+380968708439" class="link">+38 (096) 870-84-39</a>
                            <a href="mailto:Volodimir.chernuha@podiliyagold.com" class="link">Volodimir.chernuha@podiliyagold.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="img_block">
                            <img src="{{asset('build/img/contacts/contact3.svg')}}" alt="" class="image img-fluid">
                        </div>
                        <div class="text_block">
                            <h2 class="title">Oksana Lanskorunska</h2>
                            <div class="position">Sales Departament</div>
                            <a href="tel:+380964305845" class="link">+38 (096) 430-58-45</a>
                            <a href="mailto:oksana.lanskorunska@podiliyagold.com" class="link">oksana.lanskorunska@podiliyagold.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="item">
                        <div class="img_block">
                            <img src="{{asset('build/img/contacts/contact4.jpg')}}" alt="" class="image img-fluid">
                        </div>
                        <div class="text_block">
                            <h2 class="title">Anna Timoschuk</h2>
                            <div class="position">Sales Departament</div>
                            <a href="tel:+380684501225" class="link">+38 (068) 450-12-25</a>
                            <a href="mailto:anna.timoshuk@podiliyagold.com" class="link">anna.timoshuk@podiliyagold.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('templates.footer_block')
@include('templates.footer')
@include('templates.modals')

</body>
</html>