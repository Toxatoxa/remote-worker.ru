@extends('layouts.main')

@section('content')

    <div class="header">
        <h1>Обратная связь</h1>
        <h2>We’d love to hear from you, so fill out this form and we'll get back to you</h2>
    </div>
    <div class="section-layout">
        <div class="content">
            <form class="pure-form pure-g" id="contact-form" method="POST" action="//formspree.io/toxaphp@gmail.com" novalidate="novalidate">
                <input type="hidden" name="_next" value="http://http://remote-worker.ru/contact">

                <div class="contact-form pure-u-1 pure-u-md-1-2 pure-u-lg-1-2">
                    <fieldset class="pure-group">
                        <input type="text" class="pure-input-1" name="name" placeholder="Name" required="" aria-required="true">
                        <input type="email" class="pure-input-1" name="_replyto" placeholder="Email" required="" aria-required="true">
                    </fieldset>

                    <fieldset class="pure-group">
                        <input type="text" class="pure-input-1" name="_subject" placeholder="Subject">
                        <textarea class="pure-input-1" name="message" placeholder="Message" required="" aria-required="true"></textarea>
                    </fieldset>

                    <label for="terms" class="pure-checkbox">
                        By clicking submit you agree to the <a href="/terms" target="_blank">Terms</a>.
                    </label>


                    <input type="text" name="_gotcha" style="display: none">
                    <button type="submit" class="pure-button pure-input-1 pure-button-primary" value="send">Submit</button>


                    <div id="contact-form-message" style="display: none">
                        <label>Message received! We'll be in touch.</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection