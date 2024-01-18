<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Withdraw</title>
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
            font-size: 13px;
        }

        .fs-8 {
            font-size: 15px;
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

        .circle-icon {
            width: 20px;
            height: 20px;
            line-height: 20px;
        }

        .method-img {
            height: 120px;
            width: 200px;
        }
    </style>
</head>

<body class="bg-light" style="overflow-x: hidden">


    <div class="container">
        <div class="align-items-center d-flex justify-content-center mb-4 bg-white">
            <div class="text-center">
                @if ($method == 'bkash')
                    <img src="https://www.maxecash.com/public/upload/method/1690800029O8b.png" class="method-img">
                @else
                    <img src="https://www.maxecash.com/public/upload/method/1690830958kit.png" class="method-img">
                @endif
            </div>
        </div>


        <div class=" border-0 mb-3">
            <div class="">
                <div class="d-flex justify-content-between align-items-center py-2 mb-3"
                    style="border-bottom: 1px solid silver;">
                    <div class="fs-8 me-2">অ্যাকাউন্ট</div>
                    <div class="me-2 fs-8">
                        <span id="account_text">
                            @if ($method == 'bkash')
                                {{ $bkash }}
                            @else
                                {{ $nagad }}
                            @endif
                        </span>

                        <a href="javascript::void();" id="copy_account">
                            <i class="las la-copy fs-6"></i>
                        </a>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center py-2"
                    style="border-bottom: 1px solid silver;">
                    <div class="fs-8 me-2">পরিমাণ</div>
                    <div class="me-2 fs-8">
                        <span id="amount_text">
                            {{ $amount }}
                        </span>

                        <a href="javascript::void();" id="copy_amount">
                            <i class="las la-copy fs-6"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <ul class="list-unstyled">
            <li class="fs-8 mb-3 text-danger"> স্থানান্তর শুধুমাত্র একই ধরনের ওয়ালেটে করা যেতে পারে। উদাহরণস্বরূপ, NAGAD
                শুধুমাত্র NAGAD-এ স্থানান্তর করা যেতে পারে।</li>
            <li class="fs-8 mb-3 text-danger"> আপনি যদি এটি করতে না জানেন তবে কিভাবে করবেন ভিডিও দেখুন </li>
            <li class="fs-8 mb-3 text-danger"> ট্রান্সফারের পরিমাণ অবশ্যই পূরণ করতে হবে যেভাবে আপনি এটি তৈরি করেছেন,
                অন্যথায় আমানত সফল হবে না'</li>
        </ul>

        <h5 class="fw-bold fs-6">
            সফলভাবে ক্যাশ আউট করার পর অনুগ্রহ করে ট্রানজেকশন আইডি পূরণ করুন
        </h5>

        <div class="fs-8 text-danger">
            মানি ট্রান্সফার সম্পন্ন হলে ডিপোজিট অর্ডার বাতিল করবেন না
        </div>


        <form action="/payment-confirm" method="post">
            @csrf
            {{-- <div class="card border-0 mb-3">
                <div class="card-body">
                    <div class="mb-2 mt-3">
                        <input type="number" name="my_number" class="form-control border-0 shadow-none fs-8"
                            placeholder="ক্যাশ আউট ফ্রম:" />
                    </div>
                </div>
            </div> --}}


            <div class="card border-0 mb-3 mt-2">

                <div class="">
                    <input type="text" autofocus required name="transaction_id" class="form-control border-0 shadow-none fs-8"
                        placeholder="অর্থপ্রদানের পরে অনুগ্রহ করে আপনার [লেনদেন আইডি]" />
                </div>

            </div>

            <input type="hidden" name="url" value="{{ $request_url }}">
            <input type="hidden" name="user" value="{{ $user_id }}">
            <input type="hidden" name="amount" value="{{ $amount }}">
            <input type="hidden" name="method" value="{{ $method }}">
            <input type="hidden" name="method_number"
                value="@if ($method == 'bkash') {{ $bkash }}  @else {{ $nagad }} @endif">

            <button type="submit" class="btn btn-lg btn-success mb-3 w-100 border-0 fs-8" style="border-radius: 25px;">পেমেন্ট নিশ্চিত করুন</button>
        </form>

        <a href="{{ $request_url }}" class="nav-link">Back To Main Website</a>
    </div>



    <script src="{{ asset('frontend') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery.toast.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>

    @if(session()->has('type'))
    <script>
      $.toast({
        text: @json(session()->get('type')),
        position: "mid-center",
        allowToastClose: false,
        stack: false,
        icon: @json(session()->get('type')),
        loader: false,
      });
    </script>
    @endif

    @if(session()->has('error'))
    <script>
      $.toast({
        text: @json(session()->get('error')),
        position: "mid-center",
        allowToastClose: false,
        stack: false,
        loader: false,
      });
    </script>
    @endif
    
    @if(session()->has('success'))
    <script>
      $.toast({
        text: @json(session()->get('success')),
        position: "mid-center",
        allowToastClose: false,
        stack: false,
        loader: false,
        
      });
    </script>
    @endif
    
    @if(session()->has('message'))
    <script>
      $.toast({
        text: @json(session()->get('message')),
        position: "mid-center",
        allowToastClose: false,
        stack: false,
        loader: false,
      });
    </script>
    @endif

</body>

</html>
