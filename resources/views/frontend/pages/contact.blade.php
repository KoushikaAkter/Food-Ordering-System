@extends('frontend.master')

@section('content')
<div class="content-wrapper" style="margin-top: 100px;"> <!-- Adjust margin-top value as needed -->
    <div class="contact">
        <div class="container">
            <div class="section-header text-center">
                <p>Contact Us</p>
                <h2>For Any Query</h2>
                
            </div>
            <div class="d-flex justify-content-center align-items-center flex-wrap contact-information">
                
                <div class="col-md-6 col-lg-3 animated-slide">
                    <div class="contact-info">
                        
                        <!-- Contact Social Section (if needed) -->
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center contact-form animated-slide">
                <div class="col-md-6">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-success " type="submit" id="sendMessageButton">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
    .d-flex {
        display: flex;
    }

    .justify-content-center {
        justify-content: center;
    }

    .align-items-center {
        align-items: center;
    }

    .flex-wrap {
        flex-wrap: wrap;
    }

    .contact-information .col-md-6, .contact-form .col-md-6 {
        display: flex;
        justify-content: center;
    }

    .contact-information .contact-info, .contact-form form {
        width: 100%;
    }

    /* Floating animation */
    .animated-slide {
        opacity: 0;
        transform: translateY(-50px);
        animation: slideDown 1s ease-out forwards;
    }

    /* Keyframes for the slide-down animation */
    @keyframes slideDown {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<!-- Custom JS for form validation -->
<script>
    (function() {
        "use strict";

        var forms = document.querySelectorAll('.contact-form form');

        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
    })();
</script>
@endsection
