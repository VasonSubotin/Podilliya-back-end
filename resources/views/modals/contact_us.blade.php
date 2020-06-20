<div class="modal fade" id="contact_us" tabindex="-1" role="dialog" aria-labelledby="Contact Us" aria-hidden="true">
    <div class="modal-dialog modal_contact" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
            <div class="contact_form_wrap">
                <h2>@lang('home.menu.contact.us')</h2>
                <p class="mb-4">@lang('home.menu.get.in.touch')</p>
                <form action="/contacts" method="post" id="contact_us_form">
                    <div class="form-group ffl-wrapper">
                        <label class="ffl-label" for="name">@lang('home.menu.contact.form.name')</label>
                        <input id="name" name="name" type="text" class="form-control form-control-lg">
                    </div>
                    <div class="form-group ffl-wrapper">
                        <label class="ffl-label" for="email">@lang('home.menu.contact.form.email')</label>
                        <input id="email" name="email" type="email" class="form-control form-control-lg">
                    </div>
                    <div class="form-group ffl-wrapper">
                        <label for="message" class="ffl-label">@lang('home.menu.contact.form.text')</label>
                        <textarea id="message" name="message" class="form-control form-control-lg"></textarea>
                    </div>
                    <input type="submit" value="@lang('home.menu.send.request')" id="contact_us" class="btn btn-primary btn-block btn-lg">
                </form>
            </div>
        </div>
    </div>
</div>