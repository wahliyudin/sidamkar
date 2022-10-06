@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <div class="d-flex justify-content-between accordion-header py-3 px-3"
                                id="panelsStayOpen-headingOne">
                                <div class="d-flex align-items-center" style="color: #000000;">
                                    <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                    Lorem ipsum dolor sit amet.
                                </div>
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseOne">
                                </button>
                            </div>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingOne" style="">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default, until
                                    the collapse plugin adds the appropriate classes that we use to style each element.
                                    These classes control the overall appearance, as well as the showing and hiding via CSS
                                    transitions. You can modify any of this with custom CSS or overriding our default
                                    variables. It's also worth noting that just about any HTML can go within the
                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="d-flex justify-content-between accordion-header py-3 px-3"
                                id="panelsStayOpen-headingTwo">
                                <div class="d-flex align-items-center">
                                    <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                    Lorem ipsum dolor sit amet.
                                </div>
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseTwo">
                                </button>
                            </div>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingTwo" style="">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default, until
                                    the collapse plugin adds the appropriate classes that we use to style each element.
                                    These classes control the overall appearance, as well as the showing and hiding via CSS
                                    transitions. You can modify any of this with custom CSS or overriding our default
                                    variables. It's also worth noting that just about any HTML can go within the
                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="d-flex justify-content-between accordion-header py-3 px-3"
                                id="panelsStayOpen-headingThree">
                                <div class="d-flex align-items-center">
                                    <input type="checkbox" checked id="checkbox1" class="form-check-input">
                                    Lorem ipsum dolor sit amet.
                                </div>
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseThree">
                                </button>
                            </div>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingThree" style="">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default, until
                                    the collapse plugin adds the appropriate classes that we use to style each element.
                                    These classes control the overall appearance, as well as the showing and hiding via CSS
                                    transitions. You can modify any of this with custom CSS or overriding our default
                                    variables. It's also worth noting that just about any HTML can go within the
                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <style>
        .accordion .accordion-item:not(:last-child) {
            margin-bottom: 1rem;
        }

        .accordion .accordion-item {
            border-radius: 10px;
            overflow: hidden;
        }

        .accordion-button {
            align-items: center;
            background-color: transparent !important;
            border: none;
            border-radius: 0;
            color: var(--bs-accordion-btn-color);
            display: flex;
            font-size: 1rem;
            overflow-anchor: none;
            /* padding: var(--bs-accordion-btn-padding-y) var(--bs-accordion-btn-padding-x); */
            position: relative;
            text-align: left;
            transition: var(--bs-accordion-transition);
        }

        @media (prefers-reduced-motion:reduce) {
            .accordion-button {
                transition: none
            }
        }

        .accordion-button:not(.collapsed) {
            background-color: var(--bs-accordion-active-bg);
            box-shadow: inset 0 calc(var(--bs-accordion-border-width)*-1) 0 var(--bs-accordion-border-color);
            color: var(--bs-accordion-active-color)
        }

        .accordion-button:not(.collapsed):after {
            background-image: var(--bs-accordion-btn-active-icon);
            transform: var(--bs-accordion-btn-icon-transform)
        }

        .accordion-button:after {
            background-image: var(--bs-accordion-btn-icon);
            background-repeat: no-repeat;
            background-size: var(--bs-accordion-btn-icon-width);
            content: "";
            flex-shrink: 0;
            height: var(--bs-accordion-btn-icon-width);
            margin-left: auto;
            transition: var(--bs-accordion-btn-icon-transition);
            width: var(--bs-accordion-btn-icon-width)
        }

        @media (prefers-reduced-motion:reduce) {
            .accordion-button:after {
                transition: none
            }
        }

        .accordion-button:hover {
            z-index: 2
        }
    </style>
@endsection
