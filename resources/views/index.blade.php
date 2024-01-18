<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Payment Preview</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css"
        integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ asset('frontend') }}/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('frontend') }}/assets/css/jquery.toast.css" rel="stylesheet" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
        }

        .fs-7 {
            font-size: 14px;
        }

        .record-card {
            box-shadow: 0 0px 3px #a8a3a3;
            border-radius: 12px;
        }

        .footer-icon {
            font-size: 35px;
            color: black;
        }

        .link-footer-title {
            margin: 0;
            font-size: 10px;
            color: black;
        }

        .radio-buttons {
            width: 100%;
            /*margin: 0 auto;*/
            /*text-align: center;*/
        }

        .custom-radio input {
            display: none;
        }

        .radio-btn {
            /*margin: 10px;*/
            width: 145px;
            height: 90px;
            border: 2px solid #e5e5e5;
            display: inline-block;
            border-radius: 10px;
            position: relative;
            text-align: center;
            /* box-shadow: 0 0 20px #c3c3c367; */
            cursor: pointer;
        }

        .radio-btn>i {
            color: #ffffff;
            background-color: #0d6efd;
            font-size: 20px;
            position: absolute;
            top: -27px;
            left: 50%;
            transform: translateX(-50%) scale(2);
            border-radius: 50px;
            padding: 3px;
            transition: 0.5s;
            pointer-events: none;
            opacity: 0;
        }

        .radio-btn .hobbies-icon {
            width: 60px;
            height: 50px;
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .radio-btn .hobbies-icon img {
            display: block;
            width: 100%;
            height: inherit;
            margin-bottom: 10px;
        }

        .radio-btn .hobbies-icon i {
            color: #FFDAE9;
            line-height: 80px;
            font-size: 60px;
        }

        .radio-btn .hobbies-icon h3 {
            color: #0d6efd;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .custom-radio input:checked+.radio-btn {
            border: 2px solid #0d6efd;
        }

        .custom-radio input:checked+.radio-btn>i {
            opacity: 1;
            transform: translateX(-50%) scale(1);
        }
    </style>
</head>

<body style="overflow-x: hidden">
    <div class="container">
        <div class="d-flex align-items-center py-2 mb-4">
            <a href="/home" class="fs-3 text-dark me-5">
                <i class="las la-angle-left"></i>
            </a>
            <div class="d-flex align-items-center justify-content-center">
                <span class="">Payment Form</span>
            </div>
        </div>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link  active " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#recharge"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">বিনিয়োগ</button>
            </li>


        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade  show active  " id="recharge" role="tabpanel" aria-labelledby="pills-home-tab">

                <div class="card border-0 record-card mb-3">
                    <div class="card-body">
                        <p class="py-3 fs-2 fw-bold mb-5" style="border-bottom: 1px solid;">Payment Method</p>
                        <form action="/payment-preview" method="GET">
                            <div class="radio-buttons">

                                <label class="custom-radio">
                                    <input type="radio" name="payment_method" value="bkash" checked>
                                    <span class="radio-btn"><i class="las la-check"></i>
                                        <div class="hobbies-icon">
                                            <img src="https://www.maxecash.com/public/upload/method/1690800029O8b.png">
                                            <h3 class="">Bkash</h3>
                                        </div>
                                    </span>
                                </label>

                                <label class="custom-radio">
                                    <input type="radio" name="payment_method" value="nagad">
                                    <span class="radio-btn"><i class="las la-check"></i>
                                        <div class="hobbies-icon">
                                            <img src="https://www.maxecash.com/public/upload/method/1690830958kit.png">
                                            <h3 class="">Nagad</h3>
                                        </div>
                                    </span>
                                </label>
                            </div>

                            <input type="hidden" name="user"  value="{{ $user_id }}" />
                            <input type="hidden" name="amount" value="{{ $amount }}" />
                            <input type="hidden" name="bkash" value="{{ $bkash }}" />
                            <input type="hidden" name="nagad" value="{{ $nagad }}" />
                            <input type="hidden" name="url" value="{{ $request_url }}" />

                            <button type="submit" class="btn btn-primary my-3">Submit</button>
                        </form>

                        <a href="{{ $request_url }}" class="nav-link">Back To Main Website</a>
                    </div>
                </div>

            </div>

        </div>



    </div>

    <div style="height: 80px"></div>
    <!--background-color: #d4ebff;-->

    <div class="bg-white pt-2 d-none" style="position: fixed; bottom: 0px; left: 0px; width: 100%">
        <div class="row row-cols-5">
            <div class="col px-0">
                <a href="/home" class="align-items-center d-flex flex-column link py-2">
                    <i class="las la-home footer-icon"></i>
                    <p class="link-footer-title">প্রথম পাতা</p>
                </a>
            </div>
            <div class="col px-0">
                <a href="/history" class="align-items-center d-flex flex-column link py-2">
                    <i class="las la-shopping-cart footer-icon"></i>
                    <p class="link-footer-title">পয়েন্টস মল</p>
                </a>
            </div>
            <div class="col px-0">
                <a href="/preview?id=recharge" class="align-items-center d-flex flex-column link py-2">
                    <i class="las la-wave-square footer-icon"></i>
                    <p class="link-footer-title">বিনিয়োগ</p>
                </a>
            </div>
            <div class="col px-0">
                <a href="/vip" class="align-items-center d-flex flex-column link py-2">
                    <i class="las la-audio-description footer-icon"></i>
                    <p class="link-footer-title">ডিআইপি</p>
                </a>
            </div>
            <div class="col px-0">
                <a href="/mine" class="align-items-center d-flex flex-column link py-2">
                    <i class="lar la-user footer-icon"></i>
                    <p class="link-footer-title">আমার</p>
                </a>
            </div>
        </div>
    </div>
    <script src="{{ asset('frontend') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery.toast.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>



</body>

</html>
