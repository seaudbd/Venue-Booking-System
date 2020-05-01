@extends('Layouts.customer_public')
@section('content')

    <style type="text/css">
        @media only screen and (max-device-width: 992px) {
            #instant_booking_button_container  {
                margin-top: 25px;
            }
        }
    </style>
    <div style="height: 10px;"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-10 mx-auto">
            <div class="row">
                <div class="col">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <ul class="carousel-indicators">
                            <?php $images = explode(',', $venue->image); ?>
                            @foreach($images as $key => $image)
                                @if ($key === 0)
                                    <li data-target="#demo" data-slide-to="{{ $key }}" class="active"></li>
                                @else
                                    <li data-target="#demo" data-slide-to="{{ $key }}"></li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="carousel-inner">

                            @foreach($images as $key => $image)
                                @if ($key === 0)
                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/' . $image) }}" alt="Los Angeles" width="100%" class="img-fluid">
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{ asset('storage/' . $image) }}" alt="Chicago" width="100%" class="img-fluid">
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col text-center" style="font-size: 120%;">
                    {{ $venue->venue }}
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-header">$<span style="font-size: 200%; font-weight: bold;">{{ $venue->price_per_hour }}</span>/Hour</div>
                        <div class="card-body">
                            <form id="venue_booking_form">
                                <div id="venue_booking_form_message" class="text-danger text-center"></div>

                                <div class="row">
                                    <div class="col text-center border-bottom pb-2 font-weight-bold">Date and Time Information</div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="arrival_date_time">Arrival Date Time</label>
                                            <input type="text" class="form-control" name="arrival_date_time" id="arrival_date_time" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="starting_date_time">Starting Date Time</label>
                                            <input type="text" class="form-control" name="starting_date_time" id="starting_date_time" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label for="ending_date_time">Ending Date Time</label>
                                            <input type="text" class="form-control" name="ending_date_time" id="ending_date_time" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col text-center border-bottom pb-2 font-weight-bold">Guest Information</div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="number_of_adult">Number of Adults</label>
                                            <input type="text" class="form-control" name="number_of_adult" id="number_of_adult" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="number_of_children">Number of Children</label>
                                            <input type="text" class="form-control" name="number_of_children" id="number_of_children" autocomplete="off">
                                        </div>
                                    </div>
                                </div>



                                <div class="row mt-3">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-9 pt-3">
                                        <div>
                                            <input type="checkbox" id="terms_and_condition_checkbox" required> I have read and agreed with the terms and conditions. <a href="javascript:void(0); return false;" id="terms_and_condition">Terms & Condition</a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 text-right" id="instant_booking_button_container">
                                        <button type="submit" class="btn btn-primary" id="venue_booking_form_submit">Instant Booking</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-header">Accommodations</div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Number of Rooms</td>
                                    <td>{{ $venue->number_of_rooms }}</td>
                                </tr>
                                <tr>
                                    <td>Number of Seats</td>
                                    <td>{{ $venue->number_of_seats }}</td>
                                </tr>
                                <tr>
                                    <td>Number of Guests</td>
                                    <td>{{ $venue->number_of_guests }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-header">Opening Hours</div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>

                                @foreach($venue->venueOpeningHours as $venueOpeningHour)
                                    <tr>
                                        <td>{{ $venueOpeningHour->name_of_day }}</td>
                                        <td>{{ date('h:i a', strtotime($venueOpeningHour->opening_time)) }} - {{ date('h:i a', strtotime($venueOpeningHour->closing_time)) }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-header">Prices</div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Price Per Hour</td>
                                    <td>${{ $venue->price_per_hour }}</td>
                                </tr>
                                <tr>
                                    <td>Security Deposit</td>
                                    <td>${{ $venue->security_deposit_amount }}</td>
                                </tr>
                                <tr>
                                    <td>Cleaning Fee</td>
                                    <td>${{ $venue->cleaning_fee }}</td>
                                </tr>
                                <tr>
                                    <td>City Fee</td>
                                    <td>${{ $venue->city_fee }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-header">Allowing Details</div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Additional Guest</td>
                                    <td>{{ $venue->is_additional_guest_allowed }}</td>
                                </tr>
                                <tr>
                                    <td>Children</td>
                                    <td>{{ $venue->are_children_allowed }}</td>
                                </tr>
                                <tr>
                                    <td>Pet</td>
                                    <td>{{ $venue->is_pet_allowed }}</td>
                                </tr>
                                <tr>
                                    <td>Party</td>
                                    <td>{{ $venue->is_party_allowed }}</td>
                                </tr>
                                <tr>
                                    <td>Smoking</td>
                                    <td>{{ $venue->is_smoking_allowed }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-header">Features</div>
                        <div class="card-body">
                            Coming Soon!
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-header">Refund Policy</div>
                        <div class="card-body">
                            @if ($venue->refund_policy !== '---')
                                {{ $venue->refund_policy }}
                            @else
                                No Refund Policy Found!
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-header">Availability</div>
                        <div class="card-body" id="calendar">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="modal" id="terms_and_condition_modal">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">HBCL Hiring Contract</h4>
                <button type="button" class="close terms_and_condition_modal_close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" style="padding: 30px 50px 30px 50px;">
                <div class="row">
                    <div class="col text-center" style="font-size: 200%;">
                        Hornsby Bahá’í Centre of Learning
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col text-center" style="font-size: 150%;">
                        HBCL Hiring Contract<br>
                        Terms and Conditions of Use
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col" style="font-weight: bold;">
                        PURPOSE OF HORNSBY BAHÁ’Í CENTRE OF LEARNING
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col text-justify">
                        Thank you for considering hiring the Hornsby Bahá’í Centre of Learning (HBCL) for your event. We
                        look forward to being of service to you. Please ensure you study the information below, especially the
                        primary purpose of HBCL and the ‘Things You Must Know’ section.
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col text-justify">
                        The HBCL is an educational facility, established for the benefit of the Baha’is, visitors and residents
                        of Hornsby shire. Its purpose is to facilitate community building and unity promoting activities with
                        the primary focus of supporting Bahá’í functions, all guided by the aspirations of the Baha'i Faith to
                        utilise the insights of religion, science, and the arts for the spiritual and intellectual development of
                        individuals, institutions and communities, be they children, youth or adults, as we confront the
                        challenge of building a peaceful and sustainable world community in the context of an ever
                        advancing civilization. All activities that fall under this category take precedence over any other
                        activity and all programs held at the HBCL must adhere to this unique purpose.

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        Usage and hiring priority are given to: <br>
                        <div style="padding-left: 20px;">
                            <li>Members of the Bahá'í community and Bahá'í activities</li>
                            <li>Anyone who wishes to run activities that support the primary purpose of the HBCL for the
                                social, material and spiritual advancement and transformation of society and are not
                                inconsistent with the Bahá'í teachings</li>
                        </div>


                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        Next Steps:<br>
                        After studying the hiring terms and conditions please go to:<br>
                        http://hornsbybahais.org.au/booking/login<br>
                        and submit your booking application
                    </div>
                </div>

                <div class="row">
                    <div class="col text-center" style="font-size: 150%;">
                        HBCL Management
                    </div>
                </div>



                <div class="row mt-3">
                    <div class="col">
                        <ul class="a">
                            <li>
                                THINGS YOU MUST KNOW BEFORE BOOKING THE HBCL
                                <ol class="b">
                                    <li>HBCL hiring fees are fixed and are not negotiable.</li>
                                    <li>HBCL is an alcohol, smoking and drug free center (both inside and around the gardens).</li>
                                    <li>Use of music and dancing is limited to display of cultural performances only, i.e. no dance parties.</li>
                                    <li>No Leave Behind Policy. Hirer cannot leave anything behind, including disposable cups
                                        and plates, paper, books, decorative materials and so on. This policy means that all items
                                        brought to the HBCL by hirer must be taken back. A $100 fee will apply if HBCL
                                        management needs to dispose leftover item(s).</li>
                                    <li>No items should be left in the fridge by the hirer, no exceptions. HBCL management will
                                        dispose all items left in the fridge. A $100 disposal fee will apply.</li>
                                    <li>No Storage Policy. Hirer cannot store any item at HBCL, such as mats, rugs, boxes, etc...
                                        Prior discussion and approval of HBCL management is required if you need to store any
                                        item at HBCL. Storage of bulky items will attract a storage fee determined by the HBCL
                                        management. All items stored at HBCL without prior approval will be disposed and a
                                        disposal fee of $180 will apply.</li>
                                    <li>In cases where Centre’s door(s) are left open and/or alarm left disarmed by the hirer after
                                        the booking, a call out fee of $180 will be charged.</li>
                                    <li>Any damages caused to HBCL property and its facilities, during use by the hirer, must be
                                        covered by the hirer.</li>
                                    <li>A 24/7 surveillance and monitoring system is used at HBCL.</li>
                                    <li>The hirer must provide own public liability insurance to cover all liabilities of the hirer
                                        while using the HBCL. Minimum coverage must be $20 million. A certificate of currency
                                        must be provided before booking can be finalised.</li>
                                    <li>The setting up, stacking and storage of chairs, tables and other equipment is the
                                        responsibility of the hirer. For safety reasons chairs are to be stacked no more than 5 high
                                        and are not permitted to be placed in front of cupboards, fire extinguishers, equipment or
                                        exits and emergency doors to which others may need access. Chairs and tables must be
                                        returned to the allocated storage area at the end of the hire period.</li>
                                    <li>The hirer is responsible for any breakages, theft or damage caused to the facility or
                                        supplied equipment. Should such an incident occur, HBCL Management should be
                                        contacted immediately. Where such damage or loss exceeds the security deposit, a tax
                                        invoice for the balance due will be payable by the hirer within 14 days.</li>
                                    <li>Any spillage should be cleaned immediately by the hirer to avoid the likelihood of injury
                                        and possible liability.</li>
                                    <li>At the conclusion of the hiring period, all rubbish must be removed from the facility and
                                        disposed of in the bins located behind the facility. It is the responsibility of the hirer to
                                        take with them any rubbish that does not fit in the HBCL bins. Please ensure that the bins
                                        are not too full that the lids cannot close properly. A cleaning fee of $100 will apply if
                                        rubbish is left outside the bins.</li>
                                    <li>All sections of the Centre must be left in a clean and tidy condition, all tables and chairs
                                        are wiped clean before being put away by the hirer, floors swept, kitchen and bathroom
                                        cleaned, and decorations removed.</li>
                                    <li>The hirer is responsible for the safety and supervision of all guests and invitees while at
                                        the HBCL. Children under the age of twelve (12) must always be supervised by a
                                        responsible adult over the age of eighteen (18).</li>
                                    <li>The hirer is responsible for personal belongings at all times while using the HBCL. No
                                        items can be left behind as the centre does not have a lost property facility.</li>
                                    <li>The hirer is responsible for managing health and safety risks while using the centre. The
                                        HBCL management does not take any responsibility for any injury and cannot provide any
                                        emergency assistance or medical treatment.</li>
                                    <li>The hirer must read and agree to the HBCL Terms of Hiring Contact.</li>
                                </ol>
                            </li>
                            <li>
                                HBCL Terms of Hiring Contact
                                <ol>
                                    <li>The hirer must disclose an accurate description of the intended purpose of hire. The facility may only be used for the
                                        manner described.</li>
                                    <li>The hirer will have exclusive access to the designated area during the hire period only, which includes any time
                                        required to set up and packing up. The venue must not be entered prior to the hire period and similarly must be
                                        vacated by the time the hire period ends as per the Hire Agreement.</li>
                                    <li>The hirer, guests and invitees, will have nonexclusive rights to use the common areas for the purposes of ingress and
                                        egress during the Hire Period and for a reasonable period (not exceeding 15 minutes), before and after the Hire
                                        Period, and to use the bathroom(s) during the same period.</li>
                                    <li>The hirer acknowledges that areas of the HBCL, including the common areas and bathroom(s) but excluding the
                                        designated area, may be hired to others or used by the Bahá'í community during the Hire Period. We will endeavour
                                        to ensure that all HBCL users during the Hire Period treat each other with mutual respect and consideration.</li>
                                    <li>The hirer must ensure that the maximum capacity of the designated area is observed and not exceeded. Functions are
                                        to be contained within the HBCL; guests are not permitted to congregate in the outside areas, including car parks or
                                        adjacent streets.</li>
                                    <li>The hirer is responsible for the safety and supervision of all guests and invitees while at the HBCL. Children under
                                        the age of twelve (12) must always be supervised by a responsible adult over the age of eighteen (18).</li>
                                    <li>It is the responsibility of the hirer to inspect the condition of the designated area immediately prior to
                                        commencement of the hiring period. The hirer acknowledges that the designated area is appropriate for the intended
                                        use and to immediately advise of any changes since the time of the initial inspection.</li>
                                    <li>Hirers must familiarise themselves with entry and exist points and the emergency evacuation procedures displayed
                                        within each designated area.</li>
                                    <li>The hirer is required to inspect the emergency exit routes and access ways to ensure that a clear and immediate exit
                                        point is always provided.</li>
                                    <li>The hirer must notify the HBCL Management as soon as possible after any incident occasioning physical injury to any
                                        of the guests or invitees while at the Centre, by Phone to 02 9475 1110 or Email to hornsbybahaicentre@gmail.com</li>
                                    <li>Consumption of alcohol, smoking or use of drugs are prohibited at the HBCL, including the surrounding grounds. It
                                        is the responsibility of the hirer to ensure this condition is strictly adhered to. The hirer’s security deposit will be
                                        forfeited if HBCL Management identifies a breach of these conditions.</li>
                                    <li>The only dancing permitted within the HBCL are traditional dances associated with the expression of a culture,
                                        provided the underlying theme or story being represented by the traditional dances are in harmony with the ethical
                                        and moral standards of the Bahá'í Faith.</li>
                                    <li>Closed Circuit Television (CCTV) Cameras may be in operation on HBCL premises. Recorded images are collected
                                        and held by the HBCL Management. CCTV cameras in operation have signage on display.</li>
                                    <li>The hirer will occupy and/or use the facility at his/her own risk.</li>
                                </ol>
                            </li>

                            <li>
                                Fees and Charges
                                <ol class="b">
                                    <li>Bookings are for a minimum of one hour and in half hour increments thereafter. If the agreed booking time is
                                        exceeded, additional hiring fees will be applicable and will be deducted from the security deposit. Should the amount
                                        exceed the security deposit, a tax invoice for the balance due will be payable by the hirer within 14 days.</li>
                                    <li>Bookings will not be accepted less than five working days prior to the requested date unless approved by the HBCL
                                        Management.</li>
                                    <li>The hirer must be at least 21 years of age. A proof of identify is required for all bookings.</li>
                                    <li>For regular hirers (those organisations or individuals hiring the HBCL facility ten or more times per calendar year),
                                        hire charges will be calculated and invoiced in advance on a quarterly basis. Payments are due within 14 days from
                                        the date of the invoice or 7 days prior to the starting date of the booking, unless otherwise agreed to by the HBCL
                                        Management. If payment is not received by the due date, action will be taken to recover the amounts due.</li>
                                    <li>Failure to make a payment may result in HBCL terminating any future hire agreements, following which the facility
                                        keys will need to be returned.</li>
                                    <li>For Casual Hirers (those organisations or individuals hiring the HBCL facility no more than ten times per calendar
                                        year), hire fees are payable at the time of booking unless written agreement is provided by HBCL Management.</li>
                                    <li>HBCL Management reviews fees and charges each calendar year (Jan – Dec) and any changes will be effective from 1st
                                        January each year. Any increase to fees and charges will apply to bookings already confirmed.</li>
                                </ol>
                            </li>
                            <li>
                                Security Deposits
                                <ol class="b">
                                    <li>The hirer may forfeit the full security deposit in the event that the key is not returned or that the hirer commits a
                                        breach of the Hiring Agreement and/or any of the Conditions of Hire. </li>
                                    <li>Security deposit refund process is determined by method of payment.</li>
                                    <li>Payments are accepted by bank transfer only.</li>
                                </ol>
                            </li>

                            <li>
                                Cancellation Policy
                                <ol class="b">
                                    <li>HBCL’s Cancellation Policy is as follows: More than 14 days’ notice – 100% refund; 7 - 14 days’ notice – 50% refund;
                                        less than 7 days’ notice – full hire fees will be charged.</li>
                                    <li>Notification of cancellation for all hirers must be made by either Phone to 02 9475 1110 or Email to
                                        hornsbybahaicentre@gmail.com</li>
                                </ol>
                            </li>

                            <li>
                                Public Liability Insurance
                                <ol class="b">
                                    <li>The hirer, apart from Bahá’í institutions, must obtain and maintain public liability insurance for an amount adequate
                                        to cover any liability of the hirer connected to the use of the HBCL and shall be at least $20 million or as otherwise
                                        required by the HBCL Management. This must be provided prior to the commencement of the hire period.</li>
                                    <li>Should your policy expire during the term of the hire, the HBCL Management is to be provided with a copy of the
                                        insurance renewal prior to the expiry of the previous policy.</li>
                                    <li>Casual hirers employing professionals, i.e. jumping castles, fairies, catering, disk jockeys, and the like, need to
                                        provide HBCL Management with a copy of the service provider’s public liability insurance for not less than
                                        $10,000,000.00 within two weeks of making the booking.</li>
                                </ol>
                            </li>

                            <li>
                                Use of Facility
                                <ol class="b">
                                    <li>The setting up, stacking and storage of chairs, tables and other equipment is the responsibility of the hirer. For safety
                                        reasons chairs are to be stacked no more than 5 chairs high. Chairs and tables must be returned to the allocated
                                        storage area at the end of the hire period, and should not be placed in front of cupboards, fire extinguishers,
                                        equipment or doors to which others may need access.</li>
                                    <li>Furniture and equipment required, other than that already provided, must be supplied by the hirer at the hirer’s
                                        expense and shall be the liability of the hirer.</li>
                                    <li>Property not belonging to HBCL, which is kept at the facility during the currency of the agreement will be at the
                                        owner’s risk. Once the term of agreement has concluded, the hirer must remove all property unless otherwise
                                        authorised by HBCL Management. The HBCL Management shall not be held responsible for any personal property
                                        left at the facility and is authorised to remove and dispose of any item left at the centre.</li>
                                    <li>Candles may only be used if secured in a glass (or similar) holder that will contain the flame if knocked over and
                                        which will prevent wax from dripping onto surfaces. Moreover, no open fires of any type may be lit in the
                                        surrounding grounds of the facility.</li>
                                    <li>No physical activity which may impact on other hirers or the facility.</li>
                                    <li>No ball sports are permitted inside facilities unless written permission is provided by HBCL.</li>
                                    <li>Drawing pins, nails, screws, adhesive tape or any other item or substance that may damage infrastructure must not
                                        be used to affix decorations. All decorations are to be completely removed at the conclusion of the event.</li>
                                    <li>Signs may not be displayed by hirers except on designated notice boards where provided. Any non-compliant signs
                                        will be removed. External signage, such as frames, teardrops, banners are permitted for the duration of individual
                                        bookings but must be taken down prior to leaving the facility on each occasion. Please ensure that signs do not cause
                                        any damage to HBCL and are not be placed over existing signage at facilities.</li>
                                    <li>No advertising of any description or kind (e.g. billboards, posters, banners, stands etc.) shall be permitted in any part
                                        of the HBCL without the approval of the HBCL Management.</li>
                                    <li>Any external advertising (e.g. the internet, including social media and forums, flyers, websites etc.) must be approved
                                        by the HBCL Management and must clearly indicate that the hirer is only hiring the HBCL facilities and the event is
                                        not connected to the Bahá'í faith or endorsed by Bahá'í institutions.</li>
                                    <li>If media coverage is planned or anticipated by the hirer, the hirer must obtain the prior permission of the HBCL
                                        Management.</li>
                                    <li>The hirer indemnifies HBCL for any breach of copyright for an original work, including not obtaining adequate
                                        permission for the public performance or playing of a literary, dramatic or musical work.</li>
                                    <li>The hirer is responsible for any breakages, theft or damage caused to the facility or its supplied equipment. Should
                                        such an incident occur, HBCL Management should be contacted immediately. Where such losses exceed the security
                                        deposit amount, a tax invoice for the balance due will be payable by the hirer within 14 days.</li>
                                    <li>The hirer is not permitted to copy any HBCL issued keys without written permission. If additional keys are required,
                                        the hirer must contact the HBCL Management.</li>
                                    <li>Keys must be returned immediately at the completion of the hire period by placing them in a clearly marked sealed
                                        envelope in a designated box unless otherwise agreed to by the HBCL. Failure to return the keys may result in charges
                                        being imposed for replacement of locks for the facility. Security Deposit will not be refunded.</li>
                                    <li>The hirer must ensure that all lights, air conditioners, heaters, sound systems and cooking appliances are turned off,
                                        windows and doors closed, locked and secured prior to leaving the facility. </li>
                                    <li>NSW noise regulations must be adhered to at all times. Amplified music and general noise levels must be kept at a
                                        reasonable level so as not to disturb the neighbours.</li>
                                    <li>Guests must vacate the facility and all noise must cease by 10:00pm Sunday – Thursday and 12:00am (midnight)
                                        Friday, Saturday and/or a day immediately preceding a public holiday. It is the responsibility of the hirer to ensure
                                        that guests leave in a quiet and orderly manner and do not disrupt or cause a nuisance to the surrounding residents.</li>
                                    <li>Any spillage should be cleaned immediately by the hirer to prevent falls due to slips.</li>
                                    <li>Hirers must bring own cleaning products including garbage bags, to ensure that the facility is left in a clean and tidy
                                        condition. All tables and chairs should be wiped cleaned before being put away by the hirer, floors swept, kitchen
                                        equipment cleaned, decorations and rubbish removed. If the facility is left in an unsatisfactory condition that requires
                                        additional cleaning, hirers will be charged for this service and it will be deducted from the security deposit. Should
                                        the amount exceed the security deposit, a tax invoice for the balance due will be payable by the hirer within 14 days.</li>
                                    <li>At the conclusion of the hiring period, all rubbish must be removed from the facility and disposed of in the HBCL
                                        provided bins located behind the facility. It is the responsibility of the hirer to take with them any rubbish that
                                        does not fit in the HBCL bins. Please ensure that the bins are not too full that the lids cannot close
                                        properly. Failure to do so will result in the Garbage Disposal Fee being deducted from the security deposit.</li>
                                    <li>If a HBCL owned fire extinguisher is utilised unnecessarily by the hirer or any person associated with the hirer or
                                        attending the facility, HBCL Management reserves the right to deduct the cost of refiling or replacing the extinguisher
                                        from the Security Deposit amount. Should the amount exceed the security deposit, a tax invoice for the balance due
                                        will be payable by the hirer within 14 days.</li>
                                    <li>Neither the HBCL Management nor members of Bahai institutions and HBCL employees or contractors shall be
                                        liable for any loss, theft or damage sustained by the hirer or any person associated with the hirer or attending the
                                        facility.</li>
                                </ol>
                            </li>

                            <li>
                                Food Handling and Cooking
                                <ol class="b">
                                    <li>All food preparation and cooking within the facility is to be conducted in the designated kitchen area only. No
                                        cooking is permitted in other areas without prior written consent from the HBCL Management.</li>
                                    <li>No barbeques, spit roasts or gas bottles are permitted within the facility (building) or other areas without prior
                                        written consent from the HBCL Management.</li>
                                    <li>For outdoors, if permission is granted for use of barbeques and the like, at no time should an open flame be left
                                        unattended. In the event of a Total Fire Ban, hirers are obligated to follow the restrictions set by the NSW Rural Fire
                                        Service in regards to cooking with solid fuels and/or open flames. Visit www.nswrfs.com.au</li>
                                    <li>Any food preparation and cooking activities must be carried out on an appropriate surface to ensure that surfaces
                                        (e.g. tables, benches, and floor) are not damaged in any way. The hirer must protect the flooring from grease and oil
                                        spills. The hirer must ensure that after use, all surfaces are thoroughly cleaned to ensure that no food, oil or grease
                                        remains.</li>
                                    <li>Where food is offered for sale, the hirer must register their event on the NSW Food Authority website at
                                        www.foodauthority.nsw.gov.au and meet all food safety requirements as established by the NSW Food Authority.
                                        Confirmation of registration must be provided to HBCL Management no less than two weeks prior to the booking.</li>
                                </ol>
                            </li>

                            <li>
                                Indemnification and Termination of Agreement
                                <ol class="b">
                                    <li>The hirer will indemnify and keep HBCL Management indemnified for and against loss of, or damage to, HBCL
                                        property including buildings, furniture, fittings, flooring surfaces, grounds and landscaping where the loss or damage
                                        was reasonably preventable.</li>
                                    <li>The hirer will indemnify and keep HBCL Management indemnified for and against all claims, actions, suits, costs and
                                        demands which may be made or recovered against HBCL by any person whatsoever in respect of any loss, injury
                                        (including death) or damage sustained in respect of or arising out of the hiring or use of the facility except to the
                                        extent that such loss, injury or damage is caused by the negligence of HBCL Management, its servants or agents.</li>
                                    <li>In the event that the hirer commits a breach of the Hire Agreement and/or any of the above conditions of hire, HBCL
                                        Management may immediately terminate the agreement and request immediate vacation of the facility without
                                        prejudice to any right or action which may arise prior to such termination. Any fees and charges paid by the hirer will
                                        be forfeited.</li>
                                    <li>In the event of an emergency, please phone emergency services on “000”. In the event of damage sustained to HBCL
                                        facilities that requires an immediate response, please call 9475 1110. To report any other issues or provide feedback,
                                        please Phone 02 9475 1110 or Email hornsbybahaicentre@gmail.com</li>
                                </ol>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col text-center" style="font-size: 150%;">
                        Definitions
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        In this Hire Agreement, and the Terms and Conditions of Hire, the following definitions will apply:<br>
                        The bathroom(s) mean the toilet(s) labelled as such.<br>
                        The HBCL means the Hornsby Baha’i Centre of Learning situated at 19 Dural St, Hornsby including the part of the building
                        that we occupy and all grounds and its authorised servants and agents.<br>
                        The cleaning and damage bond means the amount payable in connection with your hire of the designated area set out in the
                        Hire Agreement.<br>
                        The common areas mean those areas of the building that you have non-exclusive access to during the hire period.<br>
                        The designated area means that part of the building subject to the Hire Agreement.<br>
                        The hire fee is the amount payable by you for the hire of the designated area set out in the Hire Agreement.<br>
                        The hire period means the duration of the hire granted to you over the designated area set out in the Hire Agreement.<br>
                        The permitted use is the purpose for which you may use the designated area during the hire period set out in the Hire
                        Agreement.
                    </div>
                </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>

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
                        A Booking is about to be Made. Please Confirm to Proceed.
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-primary confirm_booking" data-dismiss="modal" data-value="Confirm">Confirm</button>
                        <button type="button" class="btn btn-info confirm_booking" data-dismiss="modal" data-value="Close">Close</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function () {

        $('#arrival_date_time').datetimepicker({
            format:'Y-m-d H:i',

        });
        $('#starting_date_time').datetimepicker({
            format:'Y-m-d H:i',
        });
        $('#ending_date_time').datetimepicker({
            format:'Y-m-d H:i',
        });

        $.ajax({
            method: 'get',
            url: '{{ url('get/customer/venue/booking/' . $venue->id) }}',
            success: function (result) {
                console.log(result);
                let reservations = [];
                $.each(result.bookingsAndReservations, function (key, value) {
                    let startingDateTime = new Date(value.starting_date_time).getTime();
                    let endingDateTime = new Date(value.ending_date_time).getTime();
                    for (let loopTime = startingDateTime; loopTime <= endingDateTime; loopTime += 3600000) {
                        reservations.push({
                            title : value.status,
                            start : new Date(loopTime),
                            allDay : false,
                            backgroundColor: value.venue.background_color,
                            textColor: value.venue.text_color
                        });
                        console.log(new Date(loopTime));
                    }

                });

                $.each(result.blockedBookingDates, function (key, value) {
                    let startDateTime = new Date(value.date + ' ' + value.start_time).getTime();
                    let endDateTime = new Date(value.date + ' ' + value.end_time).getTime();
                    for (let loopTime = startDateTime; loopTime <= endDateTime; loopTime += 3600000) {
                        reservations.push({
                            title : 'Blocked',
                            start : new Date(loopTime),
                            allDay : false,
                            backgroundColor: value.background_color,
                            textColor: value.text_color
                        });
                        console.log(new Date(loopTime));
                    }

                });

                let calendarEl = document.getElementById('calendar');
                let calendar = new FullCalendar.Calendar(calendarEl, {
                    plugins: [ 'timeGrid' ],
                    events: reservations,
                    eventRender: function(event, element) {
                        const title = $(event.el).find('.fc-title');
                        title.html(title.text());
                    }
                });
                calendar.setOption('height', 1185);
                calendar.render();
            },
            error: function (xhr) {
                console.log(xhr);
            }
        });

        $('#terms_and_condition').prop('checked', false);

    });


    $(document).on('click', '#terms_and_condition', function () {
        $('#terms_and_condition_modal').modal('show');
        return false;
    });


    $(document).on('submit', '#venue_booking_form', function () {

        $('#venue_booking_form_submit').attr('disabled', 'disabled');

        $('#venue_booking_form_message').empty();
        $('#venue_booking_form').find('.text-danger').removeClass('text-danger');
        $('#venue_booking_form').find('.is-invalid').removeClass('is-invalid');
        $('#venue_booking_form').find('span').remove();

        let formData = new FormData(this);
        formData.append('venue_id', '{{ $venue->id }}');
        let termsAndCondition;
        if ($('#terms_and_condition_checkbox').prop('checked') === true) {
            termsAndCondition = 'Checked';
        } else {
            termsAndCondition = 'Not Checked';
        }
        formData.append('terms_and_condition', termsAndCondition);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            method: 'post',
            url: '{{ url('customer/booking/validate') }}',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (result) {
                console.log(result);
                $('#venue_booking_form_submit').removeAttr('disabled');
                if (result.message === 'Validation Successful') {
                    $('#message_modal').modal('show');
                }

            },
            error: function (xhr) {
                console.log(xhr);
                $('#venue_booking_form_submit').removeAttr('disabled');
                if (xhr.hasOwnProperty('responseJSON')) {
                    if (xhr.responseJSON.hasOwnProperty('errors')) {
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            if (key !== 'terms_and_condition') {
                                $('#' + key).after('<span></span>');
                                $('#' + key).parent().find('label').addClass('text-danger');
                                $('#' + key).addClass('is-invalid');
                                $.each(value, function (k, v) {
                                    $('#' + key).parent().find('span').addClass('text-danger').append('<p class="small">' + v + '</p>');
                                });
                            } else {
                                $('#terms_and_condition_checkbox').parent().parent().addClass('text-danger');
                                $('#terms_and_condition_checkbox').parent().after('<span></span>');
                                $.each(value, function (k, v) {
                                    $('#terms_and_condition_checkbox').parent().parent().find('span').addClass('text-danger').append('<p class="small">' + v + '</p>');
                                });
                            }
                        });
                    }
                }
            }
        });



        return false;
    });


    $(document).on('click', '.confirm_booking', function () {
        let value = $(this).data('value');
        console.log(value);
        if (value === 'Confirm') {
            let formData = new FormData();
            formData.append('venue_id', '{{ $venue->id }}');
            formData.append('arrival_date_time', $('#arrival_date_time').val());
            formData.append('starting_date_time', $('#starting_date_time').val());
            formData.append('ending_date_time', $('#ending_date_time').val());
            formData.append('number_of_adult', $('#number_of_adult').val());
            formData.append('number_of_children', $('#number_of_children').val());
            let termsAndCondition;
            if ($('#terms_and_condition_checkbox').prop('checked') === true) {
                termsAndCondition = 'Checked';
            } else {
                termsAndCondition = 'Not Checked';
            }
            formData.append('terms_and_condition', termsAndCondition);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                method: 'post',
                url: '{{ url('customer/booking/save') }}',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (result) {
                    console.log(result);

                    if (result.message === 'Venue Booking Successful') {
                        $('#venue_booking_form').trigger('reset');
                        location = '{{ url('customer/booking/confirmation') }}/' + result.customer_booking.id;
                    } else {
                        if (result.message === 'Create Payment') {
                            location = '{{ url('customer/payment/create') }}';
                        } else {
                            $('#venue_booking_form_message').addClass('text-danger').text(result);
                        }
                    }

                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                if (key !== 'terms_and_condition') {
                                    $('#' + key).after('<span></span>');
                                    $('#' + key).parent().parent().find('label').addClass('text-danger');
                                    $('#' + key).addClass('is-invalid');
                                    $.each(value, function (k, v) {
                                        $('#' + key).parent().find('span').addClass('text-danger').append('<p class="small">' + v + '</p>');
                                    });
                                } else {
                                    $('#terms_and_condition_checkbox').parent().parent().addClass('text-danger');
                                    $('#terms_and_condition_checkbox').parent().after('<span></span>');
                                    $.each(value, function (k, v) {
                                        $('#terms_and_condition_checkbox').parent().parent().find('span').addClass('text-danger').append('<p class="small">' + v + '</p>');
                                    });
                                }
                            });
                        }
                    }
                }
            });
        }
        return false;
    });


</script>
@endsection
