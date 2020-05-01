@extends('Layouts.customer_public')
@section('content')
<div style="height: 10px;"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-11 col-sm-10 col-md-11 col-lg-10 col-xl-9 mx-auto">
            <div class="text-center mb-4" style="font-size: 120%;">
                @if($page === 'Contact')
                    Contact with Hornsby Bahá’í
                @else
                    Send Booking Request to Hornsby Bahá’í
                @endif
            </div>
            <div id="contact_form_message" class="text-danger text-center mb-3"></div>
            <form id="contact_form">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="phone">Interested in</label>
                            <select class="form-control" id="interested_in" name="interested_in">
                                <option value="">Select an Option</option>
                                <option value="Shared Workspace">Shared Workspace</option>
                                <option value="Private Office">Private Office</option>
                                <option value="Meeting Room">Meeting Room</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="phone">Message</label>
                            <textarea class="form-control" id="message" name="message" placeholder="Write Your Message Here..." rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col text-right">
                        @if($page === 'Contact')
                            <button type="submit" class="btn btn-primary" id="contact_form_submit">Submit</button>
                        @else
                            <button type="submit" class="btn btn-primary" id="contact_form_submit">Send Request</button>
                        @endif
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>




<div class="modal" id="message_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Congrats!</h4>
                <button type="button" class="close message_modal_close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" style="padding: 30px 20px 30px 20px;">
                <div class="row">
                    <div class="col text-center">
                        Thank You for Your Interest in Booking Assembly. We will Contact You Soon.
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {
        clearContactForm();
    });

    function clearContactForm() {
        $('#contact_form_message').empty();
        $('#contact_form').find('.text-danger').removeClass('text-danger');
        $('#contact_form').find('.is-invalid').removeClass('is-invalid');
        $('#contact_form').find('span').remove();
        $('#contact_form_submit').removeAttr('disabled');
        $('#contact_form').trigger('reset');
    }

    $(document).on('submit', '#contact_form', function () {
        $('#contact_form_message').empty();
        $('#contact_form').find('.text-danger').removeClass('text-danger');
        $('#contact_form').find('.is-invalid').removeClass('is-invalid');
        $('#contact_form').find('span').remove();
        $('#contact_form_submit').attr('disabled', 'disabled');
        let formData = new FormData(this);
        formData.append('_token', '{{ csrf_token() }}');
        $.ajax({
            method: 'post',
            url: '{{ url('customer/contact/save') }}',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (result) {
                console.log(result);
                $('#contact_form_submit').removeAttr('disabled');
                if (result === 'Contact Data Saved Successfully') {
                    clearContactForm();
                    $('#message_modal').modal('show');
                }
            },
            error: function (xhr) {
                console.log(xhr);
                $('#contact_form_submit').removeAttr('disabled');
                if (xhr.hasOwnProperty('responseJSON')) {
                    if (xhr.responseJSON.hasOwnProperty('errors')) {
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            $('#' + key).after('<span></span>');
                            $('#' + key).parent().find('label').addClass('text-danger');
                            $('#' + key).addClass('is-invalid');
                            $.each(value, function (k, v) {
                                $('#' + key).parent().find('span').addClass('text-danger').append('<p>' + v + '</p>');
                            });
                        });
                    }
                }
            }
        });
        return false;
    });



</script>
@endsection