<div class="contact_form_wrap">
    <h2>@lang('home.menu.contact.us')</h2>
    <p class="mb-4">@lang('home.menu.get.in.touch')</p>
    <form action="/contacts" method="post" id="footer_contact_form">
        <div class="form-group ffl-wrapper">
            <label class="ffl-label" for="name">@lang('home.menu.contact.form.name')</label>
            <input id="name" type="text" name="name" class="form-control form-control-lg">
        </div>
        <div class="form-group ffl-wrapper">
            <label class="ffl-label" for="email">@lang('home.menu.contact.form.email')</label>
            <input id="email" type="email" name="email" class="form-control form-control-lg">
        </div>
        <div class="form-group ffl-wrapper">
            <label for="message" class="ffl-label">@lang('home.menu.contact.form.text')</label>
            <textarea id="message" name="message" class="form-control form-control-lg"></textarea>
        </div>
        <input type="submit" value="@lang('home.menu.send.request')" class="btn btn-primary btn-block btn-lg">
    </form>
</div>