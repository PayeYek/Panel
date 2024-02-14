<x-layout.landing.land :land="$land">

    <div class="px-5 xl:px-0 flex flex-col lg:flex-row  gap-10">
        <div class="mt-10 md:mt-0 flex-1 space-y-5">

            <main class="flex flex-col md:flex-row gap-x-10">
                <img class="rounded-lg mb-10 bg-gray-200 dark:bg-gray-700 p-10 md:w-1/3"
                     src="{{$product->image}}" alt="{{$product->title}}">
                <div>
                    <h1 class="text-3xl font-bold font-bakh text-center md:text-start">{{$product->name}}</h1>
                    <div class="max-w-xs space-y-2">
                        <div class="flex items-center gap-2">
                            <h2 class="font-bakh">نوع:</h2>
                            <h3 class="font-bold font-bakh">{{$product->category->title}}</h3>
                        </div>
                        @if($product->tonnage)
                            <div class="flex items-center gap-2">
                                <h2 class="font-bakh">تناژ:</h2>
                                <h3 class="font-bold font-bakh">{{$product->tonnage}}</h3>
                            </div>
                        @endif

                        <div class="flex items-center gap-2">
                            <h2 class="font-bakh">برند:</h2>
                            <h3 class="font-bold font-bakh">{{$product->brand->title}}</h3>
                        </div>
                        <div class="flex items-center gap-2">
                            <h2 class="font-bakh">کشور سازنده:</h2>
                            <h3 class="font-bold font-bakh">{{$product->brand->country}}</h3>
                        </div>

                    </div>
                </div>

            </main>

            <div class="flex flex-col gap-10">
                @foreach($product->videos as $video)
                    <span>{{$video->alt}}</span>
                    <span>{{$video->link}}</span>
                    <div id="57682337205"><script type="text/JavaScript" src="https://www.aparat.com/embed/o7bOH?data[rnddiv]=57682337205&data[responsive]=yes"></script></div>
                @endforeach
            </div>



            {{-- SHORT ATRIBUTE--}}
            <ul class="bg-gray-200 dark:bg-gray-800 rounded-md flex items-center justify-center flex-wrap gap-10 p-10 ">
                <li class="flex flex-col gap-2.5 items-center justify-center p-5 lg:px-2">
                    <svg class="stroke-current" width="32" height="29" viewBox="0 0 32 29" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.20261 24.6303C1.89419 22.2897 1 19.3638 1 16.5366C1 7.95629 7.73274 1 16.0303 1C24.3345 1 31.0606 7.95629 31.0606 16.5366C31.0606 19.4624 30.2782 22.1976 28.9172 24.5383"
                            stroke-miterlimit="2.61313" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M6.78549 22.4673L3.20215 24.6304" stroke-miterlimit="2.61313" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M25.334 22.3687L28.9173 24.5384" stroke-miterlimit="2.61313" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path
                            d="M16.03 18.509C17.2028 18.509 18.1537 17.5288 18.1537 16.3196C18.1537 15.1104 17.2028 14.1301 16.03 14.1301C14.8571 14.1301 13.9062 15.1104 13.9062 16.3196C13.9062 17.5288 14.8571 18.509 16.03 18.509Z"
                            stroke-miterlimit="2.61313" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M16.9507 14.347C18.7456 13.249 20.5472 12.1444 22.3421 11.0464C24.6828 9.61304 24.4198 9.68536 22.6512 11.5526L18.1539 16.3195C18.1539 15.4516 17.6608 14.702 16.9507 14.347Z"
                              stroke-width="0.7" stroke-miterlimit="2.61313" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M6.70048 10.994L2.90674 8.95581" stroke-miterlimit="2.61313" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M25.2354 11.0072L29.1146 8.95581" stroke-miterlimit="2.61313" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M15.9648 5.81286L16.0306 1" stroke-miterlimit="2.61313" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path
                            d="M20.1199 24.6763H12.0656C11.6262 24.6763 11.27 25.0325 11.27 25.4718V27.2076C11.27 27.647 11.6262 28.0032 12.0656 28.0032H20.1199C20.5593 28.0032 20.9155 27.647 20.9155 27.2076V25.4718C20.9155 25.0325 20.5593 24.6763 20.1199 24.6763Z"
                            stroke-miterlimit="2.61313" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <strong class="text-xs font-bakh">حداکثر سرعت</strong>
                    <span class="text-sm">110 (km/h)</span>
                </li>
                <li class="flex flex-col gap-2.5 items-center justify-center p-5 lg:px-2">
                    <svg class="stroke-current" width="28" height="31" viewBox="0 0 28 31" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M4.89231 1H16.5694C17.6214 1 18.4761 1.86132 18.4761 2.90673V26.0966H2.979V2.90673C2.979 1.85474 3.84032 1 4.88574 1H4.89231Z"
                              stroke-miterlimit="2.61313" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M1.95994 26.0967H19.5019C20.0279 26.0967 20.4553 26.524 20.4553 27.05V29.588H1V27.05C1 26.524 1.42737 26.0967 1.95337 26.0967H1.95994Z"
                              stroke-miterlimit="2.61313" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M14.9978 4.20215H6.6739C6.32167 4.20215 6.03613 4.48769 6.03613 4.83992V9.9618C6.03613 10.314 6.32167 10.5996 6.6739 10.5996H14.9978C15.35 10.5996 15.6355 10.314 15.6355 9.9618V4.83992C15.6355 4.48769 15.35 4.20215 14.9978 4.20215Z"
                            stroke-miterlimit="2.61313" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M10.8824 14.9192C12.2039 16.3591 13.3743 17.582 13.2099 19.6926C12.9732 22.7565 9.29122 23.1116 8.52853 20.0871C8.31155 19.2389 8.48908 18.3579 8.8507 17.5426C9.34382 16.438 10.192 15.4715 10.8824 14.9126V14.9192Z"
                              stroke-miterlimit="2.61313" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M18.4824 10.5534C20.685 10.869 21.4083 11.7106 21.428 13.9198C21.4411 15.3926 21.2373 20.2778 21.6055 21.4415C21.7633 21.9347 22.0592 22.3686 22.6246 22.7368C23.578 23.3549 24.847 23.3877 25.7938 22.75C26.2474 22.4475 26.6222 22.007 26.8589 21.4415C27.2534 20.4816 27.0824 18.851 27.0693 17.7727C27.0561 16.655 27.043 15.5438 27.0298 14.4261C27.0167 13.3018 27.0298 13.4727 26.4578 12.5062L23.3545 7.49609"
                            stroke-miterlimit="2.61313" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M25.8596 11.5464C23.2099 13.3479 24.2554 15.9516 27.0497 16.1028"
                              stroke-miterlimit="2.61313" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <strong class="text-xs font-bakh">مصرف سوخت</strong>
                    <span class="text-sm">6.6 (Liter/100km)</span>
                </li>
                <li class="flex flex-col gap-2.5 items-center justify-center p-5 lg:px-2">
                    <svg class="stroke-current" width="75" height="41" viewBox="0 0 75 41" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M58.8012 40.049C61.8932 40.049 64.3998 37.5256 64.3998 34.4128C64.3998 31.3 61.8932 28.7766 58.8012 28.7766C55.7092 28.7766 53.2026 31.3 53.2026 34.4128C53.2026 37.5256 55.7092 40.049 58.8012 40.049Z"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M58.8015 36.6422C60.0227 36.6422 61.0127 35.6437 61.0127 34.4121C61.0127 33.1805 60.0227 32.1821 58.8015 32.1821C57.5803 32.1821 56.5903 33.1805 56.5903 34.4121C56.5903 35.6437 57.5803 36.6422 58.8015 36.6422Z"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M29.0868 40.049C32.1788 40.049 34.6854 37.5256 34.6854 34.4128C34.6854 31.3 32.1788 28.7766 29.0868 28.7766C25.9948 28.7766 23.4883 31.3 23.4883 34.4128C23.4883 37.5256 25.9948 40.049 29.0868 40.049Z"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M29.0867 36.6422C30.3079 36.6422 31.2979 35.6437 31.2979 34.4121C31.2979 33.1805 30.3079 32.1821 29.0867 32.1821C27.8655 32.1821 26.8755 33.1805 26.8755 34.4121C26.8755 35.6437 27.8655 36.6422 29.0867 36.6422Z"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M13.1469 40.049C16.2389 40.049 18.7455 37.5256 18.7455 34.4128C18.7455 31.3 16.2389 28.7766 13.1469 28.7766C10.0549 28.7766 7.54834 31.3 7.54834 34.4128C7.54834 37.5256 10.0549 40.049 13.1469 40.049Z"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M13.1472 36.6422C14.3684 36.6422 15.3584 35.6437 15.3584 34.4121C15.3584 33.1805 14.3684 32.1821 13.1472 32.1821C11.926 32.1821 10.936 33.1805 10.936 34.4121C10.936 35.6437 11.926 36.6422 13.1472 36.6422Z"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M48.5078 1H1.11291C1.05055 1 1 1.05055 1 1.11291V23.4225C1 23.4848 1.05055 23.5354 1.11291 23.5354H48.5078C48.5702 23.5354 48.6207 23.4848 48.6207 23.4225V1.11291C48.6207 1.05055 48.5702 1 48.5078 1Z"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M8.18893 31.8058H1.05664V26.8565H52.2717L52.2906 6.66406H62.6314C66.2634 6.66406 67.3079 7.27567 68.6628 10.7383L72.0502 19.5925V28.9548H73.6968V34.7604H64.4192"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M53.2214 34.7607H43.3228L40.4059 31.8438L34.064 31.825" stroke-width="0.9"
                              stroke-miterlimit="2.61313" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M24.1747 31.8152H18.1245" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M55.3955 9.46826H62.0103C64.0051 9.46826 65.3788 10.2304 66.1128 12.0841L68.7286 18.7553H55.4143L55.3955 9.46826Z"
                              stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M55.4326 21.4932H59.0458" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <strong class="text-xs font-bakh">کلاس بدنه</strong>
                    <span class="text-sm">کامیونت</span>
                </li>
                <li class="flex flex-col gap-2.5 items-center justify-center p-5 lg:px-2">
                    <svg class="stroke-current" width="60" height="37" viewBox="0 0 60 37" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M6.3358 10.9067C4.63559 10.943 4.02351 10.7435 3.60639 11.1424C2.83563 11.8815 1.63868 16.7282 1.42558 17.9025C1.00393 20.242 0.881514 22.6404 1.12181 25.1976C1.24876 26.5351 2.1238 32.3747 2.93991 33.0593C3.29355 33.3586 3.84669 33.4901 4.78974 33.4901C5.51063 33.4901 6.23152 33.4901 6.95695 33.4901C7.59623 33.4901 8.23551 33.4901 8.87479 33.4901C8.95186 32.4563 9.02441 31.4226 9.10148 30.3889C9.34631 27.2378 9.44153 27.7955 11.9034 27.6096C15.2449 27.3602 14.9094 28.3985 14.8731 30.7017C14.8641 31.4453 14.8595 32.1888 14.8641 32.9279C14.8731 35.9837 14.3744 35.8976 17.4121 35.8976C22.4357 35.8976 27.4547 35.8976 32.4783 35.8976C36.1644 35.8976 35.1986 36.2195 37.9961 33.7984C39.2565 32.7102 40.5214 31.6312 41.8725 30.6564C43.1466 29.7405 43.2146 29.6453 45.3183 29.6453C46.3702 29.6453 47.422 29.6453 48.4739 29.6453C52.6315 29.6453 51.7157 29.5274 51.8789 26.3038C51.9242 25.4379 51.8789 24.5719 51.8789 23.7059C51.8789 19.2717 51.8789 14.8376 51.8789 10.4034C51.8789 8.85736 50.9313 8.83469 50.2875 9.9455C50.1152 10.2447 49.9429 10.5394 49.7751 10.8387C48.8276 10.8387 47.8754 10.8387 46.9279 10.8387C46.3248 10.0498 45.7762 9.21101 45.1234 8.46744C42.6751 5.68816 43.5682 5.64282 38.9482 5.64282C34.5548 5.64282 30.1615 5.64282 25.7681 5.64282C22.3677 5.64282 22.4266 5.7199 20.5723 7.3113C19.8196 7.95965 19.1713 8.71228 18.4685 9.41503C17.6026 9.41503 17.4393 9.85935 16.5688 9.85935C13.6263 9.85935 13.5538 9.74147 13.5764 12.1988C13.581 12.8155 13.5764 13.4366 13.5764 14.0532C13.5764 16.3882 13.6445 16.9594 12.1528 16.837C11.84 16.8098 11.5135 16.837 11.1009 16.837C9.72263 16.837 9.67729 16.4789 9.67729 14.9192C9.67729 14.425 9.69996 13.9308 9.67729 13.4321C9.56848 11.0246 10.0899 10.8251 6.3358 10.9022V10.9067Z"
                              stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M23.4106 1H42.2853" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M29.4136 1V5.64272" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M36.6538 1V5.64272" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M59.4233 9.10669V28.1627" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M59.4235 19.3169H51.8745" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <strong class="text-xs font-bakh">حجم موتور</strong>
                    <span class="text-sm">3760 (cc)</span>
                </li>
                <li class="flex flex-col gap-2.5 items-center justify-center p-5 lg:px-2">
                    <svg class="stroke-current" width="39" height="40" viewBox="0 0 39 40" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M5.6499 16.4154L6.25222 15.9143L12.7524 9.76587L29.2559 27.1029L22.5437 33.3285L19.6044 30.4614L19.5369 26.1248L13.5908 19.8318L9.04696 20.1835L5.6499 16.4154Z"
                              stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M14.3521 11.4429L21.0257 4.91382" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M27.4492 25.2045L34.3542 18.2996" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M19.3535 3.23682L35.9919 19.9475" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M19.3535 3.23688L20.5726 1.90215C22.5193 -0.179457 24.3359 1.6564 25.9886 3.3477L36.5798 14.1894C37.8567 15.4952 38.7963 16.9408 37.3604 18.4827L35.9919 19.9475"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M15.8555 6.52295L32.5661 23.4408" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M14.7475 21.0559L6.9126 29.0932" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M18.419 24.9395L10.4106 32.4323" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M5.82335 38.9999C8.48721 38.9999 10.6467 36.7542 10.6467 33.9839C10.6467 31.2136 8.48721 28.9678 5.82335 28.9678C3.15949 28.9678 1 31.2136 1 33.9839C1 36.7542 3.15949 38.9999 5.82335 38.9999Z"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                    <strong class="text-xs font-bakh">نوع موتور</strong>
                    <span class="text-sm">دیزلی</span>
                </li>
                <li class="flex flex-col gap-2.5 items-center justify-center p-5 lg:px-2">
                    <svg class="stroke-current" width="48" height="41" viewBox="0 0 48 41" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M2.5143 16.3481C2.00953 16.3426 1.50476 16.3481 1 16.3481V15.0613V13.7189V5.92006C1 2.7639 1.93188 1 5.39311 1H15.383C19.2491 1 20.4528 1.83203 20.4528 5.77029C20.4528 8.31629 20.4528 10.8678 20.4528 13.4138C20.4528 13.9186 20.4528 14.4234 20.4528 14.9281C20.4528 15.4052 20.4528 15.8877 20.4528 16.3648C19.9203 16.3648 19.3934 16.3648 18.8609 16.3648C15.8378 16.3648 16.5201 16.8806 15.6437 14.0074C15.2221 12.6262 15.4884 12.8814 14.0129 12.8814C11.894 12.8814 9.77512 12.8814 7.65622 12.8814C5.89232 12.8814 6.33053 12.7871 5.67045 14.5232C4.92163 16.6865 5.31545 16.3648 2.50874 16.3481H2.5143Z"
                              stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M6.69629 7.51196H14.3898" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.8457 12.8867V28.784" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M10.8459 39.9555C13.9308 39.9555 16.4316 37.4547 16.4316 34.3699C16.4316 31.285 13.9308 28.7842 10.8459 28.7842C7.76105 28.7842 5.26025 31.285 5.26025 34.3699C5.26025 37.4547 7.76105 39.9555 10.8459 39.9555Z"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M28.9503 24.613C28.4456 24.6185 27.9408 24.613 27.436 24.613V25.8998V27.2422V35.041C27.436 38.1972 28.3679 39.9611 31.8291 39.9611H41.819C45.6852 39.9611 46.8888 39.1291 46.8888 35.1908C46.8888 32.6448 46.8888 30.0932 46.8888 27.5472C46.8888 27.0425 46.8888 26.5377 46.8888 26.0329C46.8888 25.5559 46.8888 25.0733 46.8888 24.5963C46.3563 24.5963 45.8294 24.5963 45.2969 24.5963C42.2739 24.5963 42.9561 24.0805 42.0797 26.9537C41.6582 28.3349 41.9244 28.0797 40.4489 28.0797C38.33 28.0797 36.2112 28.0797 34.0923 28.0797C32.3284 28.0797 32.7666 28.174 32.1065 26.4379C31.3577 24.2746 31.7515 24.5963 28.9448 24.613H28.9503Z"
                              stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M33.1328 33.4492H40.8263" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M37.2822 28.0743V12.177" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M37.282 12.177C40.3669 12.177 42.8676 9.67618 42.8676 6.59129C42.8676 3.50641 40.3669 1.00562 37.282 1.00562C34.1971 1.00562 31.6963 3.50641 31.6963 6.59129C31.6963 9.67618 34.1971 12.177 37.282 12.177Z"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                    <strong class="text-xs font-bakh">سیلندر</strong>
                    <span class="text-sm">16</span>
                </li>
                <li class="flex flex-col gap-2.5 items-center justify-center p-5 lg:px-2">
                    <svg class="stroke-current" width="43" height="41" viewBox="0 0 43 41" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.92692 6.85352V15.4017C3.92692 19.7615 3.76543 20.7102 8.5189 20.7102H38.7554"
                              stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M15.3564 6.85352V34.5922" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M27.1494 6.84863V34.5974" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M38.937 6.84863V34.5974" stroke-width="0.9" stroke-miterlimit="2.61313"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M3.92677 6.85352C5.54318 6.85352 6.85353 5.54317 6.85353 3.92676C6.85353 2.31036 5.54318 1 3.92677 1C2.31037 1 1 2.31036 1 3.92676C1 5.54317 2.31037 6.85352 3.92677 6.85352Z"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M15.3565 6.85352C16.9729 6.85352 18.2832 5.54317 18.2832 3.92676C18.2832 2.31036 16.9729 1 15.3565 1C13.7401 1 12.4297 2.31036 12.4297 3.92676C12.4297 5.54317 13.7401 6.85352 15.3565 6.85352Z"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M27.0127 6.85352C28.6291 6.85352 29.9395 5.54317 29.9395 3.92676C29.9395 2.31036 28.6291 1 27.0127 1C25.3963 1 24.0859 2.31036 24.0859 3.92676C24.0859 5.54317 25.3963 6.85352 27.0127 6.85352Z"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M39.0733 6.85352C40.6897 6.85352 42 5.54317 42 3.92676C42 2.31036 40.6897 1 39.0733 1C37.4568 1 36.1465 2.31036 36.1465 3.92676C36.1465 5.54317 37.4568 6.85352 39.0733 6.85352Z"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M15.3565 40.4456C16.9729 40.4456 18.2832 39.1352 18.2832 37.5188C18.2832 35.9024 16.9729 34.592 15.3565 34.592C13.7401 34.592 12.4297 35.9024 12.4297 37.5188C12.4297 39.1352 13.7401 40.4456 15.3565 40.4456Z"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M27.0127 40.4456C28.6291 40.4456 29.9395 39.1352 29.9395 37.5188C29.9395 35.9024 28.6291 34.592 27.0127 34.592C25.3963 34.592 24.0859 35.9024 24.0859 37.5188C24.0859 39.1352 25.3963 40.4456 27.0127 40.4456Z"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M39.0733 40.4456C40.6897 40.4456 42 39.1352 42 37.5188C42 35.9024 40.6897 34.592 39.0733 34.592C37.4568 34.592 36.1465 35.9024 36.1465 37.5188C36.1465 39.1352 37.4568 40.4456 39.0733 40.4456Z"
                            stroke-width="0.9" stroke-miterlimit="2.61313" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                    <strong class="text-xs font-bakh">نوع جعبه دنده</strong>
                    <span class="text-sm">دستی</span>
                </li>
            </ul>


            @foreach($product->attributes->sortBy('parent_id')->groupBy('parent_id') as $key => $attrs)
               <h1 class="font-black text-lg pt-14 ">{{\App\Models\LandAttribute::whereId($key)->first()->name}}</h1>
                @foreach($attrs as $attr)
                    <div class="flex flex-col gap-5 ">
                        <span class="font-bold">{{ $attr->name }}:</span>
                        <span>{{ $attr->pivot->value->value }}</span>
                    </div>
                @endforeach
            @endforeach


            <main class="leading-9 mt-10">
                {!! $product->body !!}
            </main>
        </div>

        <div class="shrink-0 lg:pt-14 relative flex flex-col gap-10">
            <div class="lg:pt-10 sticky top-0 flex flex-col items-center">
                <img class="rounded-lg"
                     src="{{ asset('assets/images/test/jac 9 ton.png') }}"
                     alt="{{''}}">
            </div>

        </div>
    </div>


</x-layout.landing.land>
