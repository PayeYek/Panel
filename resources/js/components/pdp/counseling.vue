<template>
    <section>
        <div class="flex_center flex-col gap-2 md:flex-row lg:gap-4">
            <div
                class="text-lg font-medium text-white cursor-pointer rounded-custom bg-stone-700 hover:bg-stone-800 flex_center h-11 w-52"
                @click="OpenModal"> مشاوره و خرید
            </div>
            <Link v-bind:href="catalogLink"
                  class="text-lg font-medium bg-white border cursor-pointer rounded-custom text-stone-700 border-stone-700 hover:text-stone-800 hover:border-stone-800 flex_center h-11 w-52">
                دانلود کاتالوگ
            </Link>
        </div>

        <!-- modal layer -->
        <div class="fixed inset-0 bg-[#ABABAB]/40 z-[5] backdrop-blur-2xl" v-if="showModal" @click="closeModal"></div>

        <!-- modal content -->
        <section v-if="showModal"
                 class="fixed overflow-auto top-0 right-0 w-full h-full sm:h-auto sm:max-w-[36rem] md:max-w-[40rem] lg:max-w-4xl xl:max-w-5xl sm:top-1/2 sm:right-1/2 sm:translate-x-1/2 sm:-translate-y-1/2 z-[6] sm:overflow-hidden">
            <!-- calculator -->
            <section class="grid grid-cols-1 lg:grid-cols-10 gap-5 drop-shadow-smooth bg-white rounded-custom relative"
                     v-if="counselingStep == 0">
                <div @click="closeModal"
                     class="absolute top-4 left-4 size-7 rounded-full bg-stone-400/50 flex_center cursor-pointer">
                    <svg class="size-5 stroke-stone-700" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 12L6 6M12 12L18 18M12 12L18 6M12 12L6 18" stroke="current" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <section class="lg:col-span-6 p-6 lg:pb-12">
                    <section class="flex flex-col max-w-[33rem] w-full mx-auto">
                        <!-- vehicle price amount -->
                        <section class="mb-8 lg:mb-12">
                            <p
                                class="text-sm cursor-default pr-4 font-medium text-stone-700 mb-4 relative before:absolute before:content-[''] before:rounded-full before:bg-normal before:top-1.5 before:right-0 before:size-2">
                                میزان وام درخواستی </p>
                            <div class="w-full h-12 mb-6 font-medium text-sm flex_between px-6">
                                <!-- decrease -->
                                <button type="button"
                                        v-bind:class="'p-2 cursor-pointer text-[#1EA0FF] ' + (loanInitialValue > loanMin ? '' : 'opacity-40 pointer-events-none')"
                                        @click="loanOrder('minus')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-6 stroke-current">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14"/>
                                    </svg>
                                    <span class="sr-only"> decrease </span>
                                </button>
                                <p class="text-stone-950 lg:text-3xl font-medium text-xl sm:text-2xl cursor-default">
                                    {{ numberWithCommas(loanInitialValue) }}
                                    <span class="hidden sm:inline-block"> تومان </span>
                                </p>
                                <!-- increase -->
                                <button type="button"
                                        v-bind:class="'p-2 cursor-pointer text-[#1EA0FF] ' + (loanInitialValue < loanMax ? '' : 'opacity-40 pointer-events-none')"
                                        @click="loanOrder('plus')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-6 stroke-current">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 4.5v15m7.5-7.5h-15"/>
                                    </svg>
                                    <span class="sr-only"> increase </span>
                                </button>
                            </div>
                            <div class="h-2 w-full bg-stone-200 rounded-full mb-4 relative">
                                <input v-bind:style="{ background: priceSliderBackground }" type="range"
                                       class="dir-rtl absolute top-0.5 inset-x-0.5 range__input rounded-full"
                                       :min="loanMin" v-bind:max="loanMax" v-bind:value="loanInitialValue"
                                       v-model="loanInitialValue" v-bind:step="loanSteps"/>
                            </div>
                            <div
                                class="text-sm font-normal flex items-center justify-between mb-4 text-stone-700 cursor-default">
                                <p> 200 میلیون تومان </p>
                                <p> 3 میلیارد تومان </p>
                            </div>
                        </section>

                        <!-- payment duration -->
                        <section class="mb-8 lg:mb-12">
                            <p
                                class="text-sm pr-4 cursor-default font-medium text-stone-700 mb-4 relative before:absolute before:content-[''] before:rounded-full before:bg-normal before:top-1.5 before:right-0 before:size-2">
                                مدت زمان بازپرداخت <span class="sm:hidden text-stone-700 text-sm font-normal"> (سال)
                                </span></p>

                            <section class="flex_center gap-2 text-stone-700 text-base font-normal">
                                <div>
                                    <input type="radio" value="12" v-model="paymentDuration" name="paymentDuration"
                                           id="12monthes" class="hidden peer"/>
                                    <label for="12monthes"
                                           class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-[#1EA0FF] peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium peer-checked:text-xl duration-200">
                                        <span> 1 </span>
                                        <span class="hidden sm:block"> ساله </span>
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" value="24" v-model="paymentDuration" name="paymentDuration"
                                           id="24monthes" class="hidden peer"/>
                                    <label for="24monthes"
                                           class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-[#1EA0FF] peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium peer-checked:text-xl duration-200">
                                        <span> 2 </span>
                                        <span class="hidden sm:block"> ساله </span>
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" value="36" v-model="paymentDuration" name="paymentDuration"
                                           id="36monthes" class="hidden peer"/>
                                    <label for="36monthes"
                                           class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-[#1EA0FF] peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium peer-checked:text-xl duration-200">
                                        <span> 3 </span>
                                        <span class="hidden sm:block"> ساله </span>
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" value="48" v-model="paymentDuration" name="paymentDuration"
                                           id="48monthes" class="hidden peer"/>
                                    <label for="48monthes"
                                           class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-[#1EA0FF] peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium peer-checked:text-xl duration-200">
                                        <span> 4 </span>
                                        <span class="hidden sm:block"> ساله </span>
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" value="60" v-model="paymentDuration" name="paymentDuration"
                                           id="60monthes" class="hidden peer"/>
                                    <label for="60monthes"
                                           class="h-12 rounded-custom w-12 peer-checked:w-16 sm:w-24 sm:peer-checked:w-28 sm:gap-1 cursor-pointer lg:w-20 lg:peer-checked:w-32 ring-1 flex_center ring-stone-400 bg-white peer-checked:ring-[#1EA0FF] peer-checked:ring-2 peer-checked:bg-stone-200 peer-checked:font-medium peer-checked:text-xl duration-200">
                                        <span> 5 </span>
                                        <span class="hidden sm:block"> ساله </span>
                                    </label>
                                </div>
                            </section>
                        </section>

                        <!-- custom profit-->
                        <section class="flex flex-col gap-4">
                            <!--  inital profit-->
                            <label for="initial-profit" class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="profit" id="initial-profit" value="initial"
                                       class="hidden peer" v-model="profitState" @change="checkProfit"/>
                                <div
                                    class="size-4 rounded-full border border-[#90A4AE] relative peer-checked:border-[#1EA0FF] peer-checked:bg-[#1EA0FF] before:absolute before:w-2 before:h-1 before:border-l before:border-b before:border-white before:top-1 before:left-[3px] before:-rotate-45 before:hidden peer-checked:before:block"></div>
                                <span class="cursor-pointer text-sm font-medium text-stone-700"> سود پیشفرض </span>
                            </label>
                            <section class="">
                                <label for="custom-profit"
                                       class="flex flex-col sm:flex-row gap-4 sm:gap-8 relative">
                                    <div class="flex items-center gap-3 cursor-pointer sm:flex-none">
                                        <input type="radio" name="profit" id="custom-profit" value="custom"
                                               class="hidden peer" v-model="profitState" @change="checkProfit"/>
                                        <div
                                            class="size-4 rounded-full border border-[#90A4AE] relative peer-checked:border-[#1EA0FF] peer-checked:bg-[#1EA0FF] before:absolute before:w-2 before:h-1 before:border-l before:border-b before:border-white before:top-1 before:left-[3px] before:-rotate-45 before:hidden peer-checked:before:block"></div>
                                        <span class="cursor-pointer text-sm font-medium text-stone-700"> سود مورد نظر شما (درصد) </span>
                                    </div>


                                    <div
                                        :class="'flex-1 rounded-custom mx-auto sm:mx-0 border h-11 flex items-center border-stone-400 ' + (profitState === 'initial' ? 'pointer-events-none opacity-50' : 'opacity-100')">
                                        <!-- decrease-->
                                        <button type="button" @click="decreasePercent"
                                                :class="'flex_center size-11 flex-none border-l border-stone-400 ' + (profitState === 'initial' ? '' : '')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor"
                                                 class="size-6 stroke-[#1EA0FF]">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14"/>
                                            </svg>
                                        </button>
                                        <input type="number" v-model="customProfit"
                                               class="w-full text-center max-w-80 px-3 border-0 placeholder:text-stone-400 focus:ring-0 text-sm font-normal"
                                               placeholder="سود مورد نظر خود را وارد کنید"
                                               :disabled="profitState === 'initial'"/>
                                        <!-- increase-->
                                        <button type="button" @click="increasePercent"
                                                :class="'flex_center aspect-square size-11 flex-none border-r border-stone-400 ' + (profitState === 'initial' ? '' : '')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor"
                                                 class="size-6 stroke-[#1EA0FF]">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M12 4.5v15m7.5-7.5h-15"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <p class="text-red-500 text-sm font-normal absolute -bottom-8 right-0">
                                        {{ profitAlert }} </p>
                                </label>
                            </section>
                        </section>

                        <!-- submit form-->
                        <!--                        <section class="flex justify-center">-->
                        <!--                            <button type="button" class="h-11 w-full max-w-64 rounded-custom border border-normal text-normal text-base font-medium flex_medium" @click="calculateValues"> محاسبه </button>-->
                        <!--                        </section>-->
                    </section>
                </section>

                <!-- total -->
                <section class="lg:col-span-4 bg-stone-200 rounded-b-custom lg:rounded-t-custom">
                    <section
                        class="text-sm font-normal px-4 py-6 lg:py-12 lg:px-10 lg:flex lg:flex-col lg:h-full lg:justify-between">
                        <section>
                            <div class="flex_between mb-4 lg:mb-6">
                                <p class="text-base lg:text-lg font-medium text-stone-700 cursor-default"> نتیجه
                                    محاسبه </p>
                                <p :class="'text-sm text-[#1EA0FF] border-b-2 border-b-transparent hover:border-b-[#1EA0FF] border-dashed font-medium cursor-pointer ' + (activeToolsButtons ? 'block' : 'hidden')"
                                   @click="trueInformationState"> اطلاعات بیشتر </p>
                            </div>
                            <ul class="list-none text-[#90A4AE] mb-6 cursor-default">
                                <li class="border-b border-b-white py-4 flex_between gap-4 text-sm font-normal">
                                    <p> مبلغ هر قسط </p>
                                    <div class="flex_row gap-2 sm:gap-4">
                                        <p class="text-stone-950"> {{ numberWithCommas(loanPerMonth) }} </p>
                                        <p> تومان </p>
                                    </div>
                                </li>
                                <li class="border-b border-b-white py-4 flex_between gap-4 text-sm font-normal">
                                    <p> مدت زمان بازپرداخت </p>
                                    <div class="flex_row gap-2 sm:gap-4">
                                        <p class="text-stone-950"> {{ paymentDurationView }} </p>
                                        <p> مـــــاه </p>
                                    </div>
                                </li>
                                <li class="border-b border-b-white py-4 flex_between gap-4 text-sm font-normal">
                                    <p class=""> مبلغ کل بازپرداخت </p>
                                    <div class="flex_row gap-2 sm:gap-4">
                                        <p class="text-stone-950"> {{ numberWithCommas(refund) }} </p>
                                        <p class=""> تومان </p>
                                    </div>
                                </li>
                                <li class="border-b border-b-white py-4 flex_between gap-4 text-sm font-normal"
                                    v-if="profitState === 'initial'">
                                    <p> خالص تسهیلات دریافتی </p>
                                    <div class="flex_row gap-2 sm:gap-4">
                                        <p class="text-stone-950"> {{ numberWithCommas(fund) }} </p>
                                        <p class=""> تومان </p>
                                    </div>
                                </li>
                            </ul>
                        </section>
                        <button
                            class="text-lg font-medium mx-auto bg-normal cursor-pointer rounded-custom text-white flex_center h-12 px-10 lg:px-14 xl:px-20"
                            type="button" @click="changeCounselingStep(1)"> درخواست مشاوره
                        </button>
                    </section>
                </section>
            </section>

            <section
                class="grid grid-cols-1 sm:grid-cols-10 gap-5 drop-shadow-smooth bg-white rounded-custom sm:rounded-custom sm:overflow-hidden relative"
                v-if="counselingStep == 1">
                <div @click="closeModal"
                     class="absolute top-4 left-4 size-7 rounded-full bg-stone-200 flex_center cursor-pointer">
                    <svg class="size-5 stroke-stone-700" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 12L6 6M12 12L18 18M12 12L18 6M12 12L6 18" stroke="current" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <!-- form -->
                <section
                    class="sm:col-span-4 bg-stone-200 rounded-b-custom lg:rounded-t-custom pt-8 px-4 pb-12 lg:px-10">
                    <h4
                        class="text-sm pr-4 font-medium text-stone-700 mb-2 lg:mb-5 cursor-default relative before:absolute before:content-[''] before:rounded-full before:bg-normal before:top-1.5 before:right-0 before:size-2">
                        تسهیلات خودروی تجاری </h4>
                    <p class="text-sm lg:text-base font-normal text-stone-700 mb-6 lg:mb-8 cursor-default"> برای درخواست
                        تسهیلات خودروی
                        تجاری
                        مشخصات را وارد کنید. </p>
                    <section>
                        <div class="flex flex-col text-stone-700 mb-9 gap-5 sm:gap-6 xl:gap-5">
                            <div class="flex flex-col gap-1 relative">
                                <label class="text-sm font-normal text-stone-700 pr-2 cursor-default"> تسهیلات </label>
                                <select name="facilities" v-model="loanInitialValue" required
                                        class="h-11 rounded-custom border border-[#CFD1D4] focus:ring-0 outline-none focus:border-[#CFD1D4] text-sm font-normal validation-input">
                                    <option value="0" selected disabled> انتخاب کنید</option>
                                    <option v-for="(option, index) in loanOptions" v-bind:key="index"
                                            v-bind:value="option.key">
                                        {{ formatValue(option.value) }} تومان
                                    </option>
                                </select>
                                <p class="absolute text-red-500 text-xs top-full right-2 font-normal"
                                   v-if="facilityAlert"> میزان تسهیلات را وارد کنید. </p>
                            </div>
                            <div class="flex flex-col gap-1 relative">
                                <label class="text-sm font-normal text-stone-700 pr-2 cursor-default"> نوع
                                    خودرو </label>
                                <select name="vehicles" required v-model="categoryType"
                                        class="h-11 rounded-custom border border-[#CFD1D4] focus:ring-0 outline-none focus:border-[#CFD1D4] text-sm font-normal validation-input">
                                    <option value="0" selected disabled> انتخاب کنید</option>
                                    <option :value="category.id" v-for="(category, index) in categoryList" :key="index">
                                        {{ category.title }}
                                    </option>
                                </select>
                                <p class="absolute text-red-500 text-xs top-full right-2 font-normal"
                                   v-if="categoryAlert"> نوع خودرو را وارد کنید. </p>
                            </div>
                            <div class="flex flex-col gap-1 relative">
                                <label class="text-sm font-normal text-stone-700 pr-2 cursor-default"> نام و نام
                                    خانوادگی </label>
                                <input name="fullname" type="text" v-model="fullname" required
                                       class="validation-input h-11 rounded-custom border border-[#CFD1D4] focus:ring-0 outline-none focus:border-[#CFD1D4] text-sm font-normal placeholder:text-[#acacac]"
                                       placeholder="نام و نام خانوادگی خود را وارد کنید..."/>
                                <p class="absolute text-red-500 text-xs top-full right-2 font-normal" v-if="nameAlert">
                                    نام و نام خانوادگی خود را وارد کنید. (بیشتر از 3 کاراکتر) </p>
                            </div>
                            <div class="flex flex-col gap-1 relative">
                                <label class="text-sm font-normal text-stone-700 pr-2 cursor-default"> شماره
                                    موبایل </label>
                                <input name="phone" type="tel" v-model="phone" required
                                       class="validation-input h-11 dir-rtl rounded-custom border border-[#CFD1D4] focus:ring-0 outline-none focus:border-[#CFD1D4] text-sm font-normal placeholder:text-[#acacac]"
                                       placeholder="شماره موبایل خود را وارد کنید..."/>
                                <p class="absolute text-red-500 text-xs top-full right-2 font-normal" v-if="phoneAlert">
                                    شماره موبایل خود را به درستی وارد کنید. </p>
                            </div>
                        </div>
                        <div class="flex_center sm:flex-col lg:flex-row gap-2">
                            <button type="submit" @click="submitForm"
                                    class="h-11 rounded-custom bg-normal text-lg font-medium text-white flex_center w-full sm:w-32 md:w-36 lg:w-full max-w-[272px]">
                                ثبت درخواست
                            </button>
                            <div @click="changeCounselingStep(0)"
                                 class="text-base font-medium bg-white border cursor-pointer rounded-custom text-stone-700 border-stone-700 hover:text-stone-800 hover:border-stone-800 flex_center h-11 w-32 md:w-36 lg:w-32">
                                مرحله قبل
                            </div>
                        </div>
                    </section>
                </section>
                <section
                    class="sm:col-span-6 p-6 text-stone-700 pt-6 px-4 lg:px-10 lg:pt-16 flex flex-col justify-between">
                    <div class="flex flex-col gap-2 lg:gap-6">
                        <h4 class="text-lg font-semibold lg:text-2xl"> دریافت تسهیلات در کوتاه ترین زمان </h4>
                        <p class="text-sm font-normal leading-6 lg:leading-7 mb-8 lg:mb-0">
                            با ثبت درخواست دریافت تسهیلات جهت خرید ماشین های سنگین، کارشناسان لیزینگ اتوبان با شما تماس
                            خواهند
                            گرفت و مراحل دریافت تسهیلات را متناسب با شرایط شما به صورت کامل به شما توضیح خواهند داد، پس
                            از
                            تکمیل
                            اطلاعات اولیه پروسه دریافت تسهیلات آغاز خواهد شد.
                            در صورت تکمیل مدارک از سمت شما پروسه دریافت تسهیلات به سرعت طی شده و در مدت زمان 2 هفته می
                            توانید
                            مبلغ تسهیلات مورد نظر را دریافت نمایید.
                        </p>
                    </div>
                    <!-- icons -->
                    <div class="flex items-end gap-6">
                        <FormIconOne classNames="w-full max-w-[480px] lg:max-w-80 xl:max-w-96"/>
                        <FormIconTwo classNames="hidden sm:block w-72 lg:w-44 xl:w-48"/>
                    </div>
                </section>
            </section>
        </section>

        <!-- modal layer -->
        <div class="fixed inset-0 bg-[#ABABAB]/40 z-[6] backdrop-blur-2xl" v-show="modalState" @click="closeModalState">
        </div>

        <!-- information modal content -->
        <section
            class="flex px-4 lg:px-8 py-10 text-sm font-medium text-stone-700 flex-col bg-white sm:rounded-custom fixed top-0 drop-shadow-base right-0 w-full h-full sm:h-auto sm:max-w-[36rem] md:max-w-[40rem] lg:max-w-[44rem] sm:top-1/2 sm:right-1/2 sm:translate-x-1/2 sm:-translate-y-1/2 z-[7] overflow-hidden"
            v-show="informationState">
            <!-- close btn -->
            <div @click="closeInformationState"
                 class="absolute top-4 left-4 size-7 rounded-full bg-stone-200 flex_center cursor-pointer">
                <svg class="size-5 stroke-stone-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12L6 6M12 12L18 18M12 12L18 6M12 12L6 18" stroke="current" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <!-- title -->
            <p
                class="mb-4 pr-4 relative before:absolute before:top-1 before:right-0 before:size-2 before:rounded-full before:bg-normal cursor-default">
                اطلاعات بیشتر </p>
            <ul class="pr-6 space-y-2 list-inside list-disc cursor-default">
                <li> تعداد چک های قابل پرداخت {{ Number(paymentDuration) + 1 }} چک</li>
                <li> مبلغ بیمه بدنه به صورت جداگانه روی اقساط محاسبه و دریافت می شود.</li>
                <li> هزینه عملیات بدون ارزش افزوده محاسبه گردیده است.</li>
                <li> سود اقساط شما معادل نرخ مصوب بانک مرکزی یعنی 23 درصد است.</li>
            </ul>
        </section>

        <!-- submit response message -->
        <section
            :class="'fixed top-4 sm:top-8 right-4 shadow-xl border-r-4 flex items-center rounded-xl p-4 h-20 w-full max-w-[90%] sm:max-w-[28rem] md:max-w-[32rem] sm:right-6 text-stone-700 text-sm sm:text-base sm:font-medium leading-6 sm:leading-7 z-[5] ' + (responseState === 'success' ? 'border-r-green-500 bg-[#E8FBED]' : 'border-r-red-600 bg-[#FFDEDE]')"
            v-if="responseShow"> {{ responseMessage }}
        </section>
    </section>
</template>

<script>
import {ref, computed, watchEffect, onMounted} from 'vue';
import {numberWithCommas} from '../../common';
import axios from "axios";

export default {
    name: 'Counseling',
    props: {
        catalogLink: String,
        categories: [Array, Object, String],
        landSlug: String,
        landId: [String, Number],
    },
    setup(props) {
        const loanSteps = ref(100000000);
        const loanMin = ref(200000000);
        const loanMax = ref(3000000000);
        const loanInitialValue = ref(400000000);
        const paymentDuration = ref(24);
        const paymentDurationView = ref(0);
        const fund = ref(0);
        const loanPerMonth = ref(0);
        const refund = ref(0);
        // const wage = ref(9.735);
        // const refunWage = ref(40.085);
        const modalState = ref(false);
        const informationState = ref(false);
        const loanOptions = ref([]);
        const showModal = ref(false);
        const counselingStep = ref(0);
        const categoryList = ref(JSON.parse(props.categories));
        const categoryType = ref(0);
        const fullname = ref("");
        const phone = ref("");
        const phoneAlert = ref(false);
        const nameAlert = ref(false);
        const categoryAlert = ref(false);
        const facilityAlert = ref(false);
        const responseShow = ref(false);
        const responseState = ref("success");
        const responseMessage = ref("");
        const timer = ref(3000);
        const profitState = ref("initial");
        const customProfit = ref("");
        const activeToolsButtons = ref(false);
        const calculationInterest = ref(0);
        const profitAlert = ref("");

        const closeModal = () => {
            showModal.value = false;
            counselingStep.value = 0;
        }

        const OpenModal = () => {
            showModal.value = true;
        }

        const generatePriceBackground = (value) => {
            let percentage = (value - loanMin.value) / (loanMax.value - loanMin.value) * 100;
            return `linear-gradient(to left, #1ea0ff ${percentage}%, transparent ${percentage}%)`;
        };

        const priceSliderBackground = computed(() => generatePriceBackground(loanInitialValue.value));

        const loanOrder = (payload) => {
            if (loanInitialValue.value < loanMax.value && payload === 'plus') {
                loanInitialValue.value = parseInt(loanInitialValue.value);
                loanInitialValue.value += loanSteps.value;
            } else if (loanInitialValue.value > loanMin.value && payload === 'minus') {
                loanInitialValue.value -= loanSteps.value;
            }
        }

        function myTimer(interval) {
            if (timer.value == 0) {
                responseShow.value = false;
                responseMessage.value = "";
                closeModal();
                clearInterval(interval);
                return false;
            }
            timer.value -= 100;
        }

        const calculateValues = () => {
            // loanInitialValue.value = parseInt(loanInitialValue.value);
            // const wageMap = {
            //     12: 5.64,
            //     24: 9.735,
            //     36: 13.225,
            //     48: 16.19,
            //     60: 18.69
            // };
            //
            // const reFundMap = {
            //     12: 21.345,
            //     24: 40.085,
            //     36: 59.295,
            //     48: 79.015,
            //     60: 99.27,
            // };
            //
            // const wageValue = wageMap[paymentDuration.value];
            // const refundWageValue = reFundMap[paymentDuration.value];
            // wage.value = wageValue;
            // refunWage.value = refundWageValue;
            //
            // const fullNumber = loanInitialValue.value - (loanInitialValue.value * wageValue) / 100;
            // fund.value = Math.floor(fullNumber / 1000) * 1000;
            //
            // const refundFullNumber = loanInitialValue.value + (loanInitialValue.value * refundWageValue) / 100;
            // refund.value = Math.floor(refundFullNumber / 1000) * 1000;
            //
            // const perMonthFullNumber = parseInt((refund.value - ((loanInitialValue.value * wageValue) / 100)) / paymentDuration.value);
            // loanPerMonth.value = Math.floor(perMonthFullNumber / 1000) * 1000;

            if (profitState.value === 'initial') {
                calculationInterest.value = 40;
                profitAlert.value = "";
            } else if (profitState.value === 'custom' && customProfit.value < 1) {
                profitAlert.value = "سود مورد نظر شما باید بیشتر از 1 درصد باشد.";
                return false;
            } else if (profitState.value === 'custom' && customProfit.value > 100) {
                profitAlert.value = "سود مورد نظر شما باید کمتر از 100 درصد باشد.";
                return false;
            } else {
                calculationInterest.value = customProfit.value;
                profitAlert.value = "";
            }
            const interest = (Number(loanInitialValue.value) * Number(calculationInterest.value) * (Number(paymentDuration.value) + 1)) / 2400;
            loanPerMonth.value = Math.floor(((Number(loanInitialValue.value) + interest) / paymentDuration.value) / 1000) * 1000;
            paymentDurationView.value = paymentDuration.value;
            refund.value = Number(paymentDuration.value) * Number(loanPerMonth.value);
            const wageMap = {
                12: 5.64,
                24: 9.735,
                36: 13.225,
                48: 16.19,
                60: 18.69
            };
            const wageValue = wageMap[paymentDuration.value];
            const fullNumber = Number(loanInitialValue.value) - (Number(loanInitialValue.value) * wageValue) / 100;
            fund.value = Math.floor(fullNumber / 1000) * 1000;
            // fund.value = 0;

            activeToolsButtons.value = true;
        };

        watchEffect(() => {
            calculateValues();
        });

        const resetTotalAmounts = () => {
            loanPerMonth.value = 0;
            paymentDurationView.value = 0;
            refund.value = 0;
            fund.value = 0;
        }

        const checkProfit = () => {
            resetTotalAmounts();
            if (profitState.value === 'initial') {
                customProfit.value = "";
            } else {
                customProfit.value = 26;
            }
        }

        const decreasePercent = () => {
            if (customProfit.value <= 1) {
                customProfit.value = 1;
            } else {
                customProfit.value = customProfit.value - 1;
                calculationInterest.value = customProfit.value - 1;
            }
        }

        const increasePercent = () => {
            if (customProfit.value >= 100) {
                customProfit.value = 100;
            } else {
                customProfit.value = Number(customProfit.value) + 1;
                calculationInterest.value = Number(customProfit.value) + 1;
            }
        }

        const generateLoanOptions = () => {
            const start = 200;
            const end = 3000;
            const increment = 100;

            for (let value = start; value <= end; value += increment) {
                const formattedKey = String(value * 1000000).padStart(9, '0'); // Add leading zeros
                loanOptions.value.push({key: Number(formattedKey), value: value});
            }
        };

        const formatValue = (value) => {
            const formattedValue = value < 1000 ? value : (value / 1000);
            const unit = value < 1000 ? 'میلیون' : 'میلیارد';
            return `${formattedValue.toLocaleString('fa')} ${unit}`;
        };

        const trueInformationState = () => {
            informationState.value = true;
            modalState.value = true;
        }

        onMounted(() => {
            generateLoanOptions();
        });

        const closeModalState = () => {
            modalState.value = false;
            informationState.value = false;
        }

        const closeInformationState = () => {
            informationState.value = false;
            modalState.value = false;
        }

        const changeCounselingStep = index => {
            counselingStep.value = index;
        }

        const resetFormInputs = () => {
            const inputs = document.querySelectorAll('.validation-input');

            inputs.forEach((element) => {
                element.classList.remove('invalid:!border-red-500');
            });

            categoryType.value = 0;
            fullname.value = "";
            phone.value = "";
        }

        const submitForm = () => {

            const inputs = document.querySelectorAll('.validation-input');

            inputs.forEach((element) => {
                element.classList.add('invalid:!border-red-500');
            });

            for (const [field, value] of Object.entries({
                amount: loanInitialValue,
                phone: phone,
                category_id: categoryType,
                full_name: fullname
            })) {
                // console.log(field, value.value);
                if (field === 'phone') {
                    if (value.value.toString().length != 11) {
                        phoneAlert.value = true;
                    } else {
                        phoneAlert.value = false;
                    }
                } else if (field === 'full_name') {
                    if (value.value.toString().length < 3 || value.value.toString().length > 63) {
                        nameAlert.value = true;
                    } else {
                        nameAlert.value = false;
                    }
                } else if (field === 'category_id') {
                    if (value.value == 0) {
                        categoryAlert.value = true;
                    } else {
                        categoryAlert.value = false;
                    }
                } else if (field === 'amount') {
                    if (value.value == 0) {
                        facilityAlert.value = true;
                    } else {
                        facilityAlert.value = false;
                    }
                }
            }

            if (!phoneAlert.value && !nameAlert.value && !categoryAlert.value && !facilityAlert.value) {
                const body = {
                    amount: loanInitialValue.value.toString(),
                    category_id: categoryType.value,
                    full_name: fullname.value.toString(),
                    phone: phone.value.toString(),
                    land_id: Number(props.landId),
                }
                axios.post(`https://paye1.com/api/l/facilities-request`, body)
                    .then(function (response) {
                        // handle success
                        if (response.data.status == 200) {
                            responseShow.value = true;
                            responseMessage.value = "اطلاعات شما ثبت شد. منتظر تماس کارشناسان ما باشید.";
                            responseState.value = "success";
                            timer.value = 3000;
                            const myInterval = setInterval(() => myTimer(myInterval), 100);
                            resetFormInputs();
                        }
                    })
                    .catch(function (error) {
                        // handle error
                        if (error.response.data.status == 400) {
                            responseShow.value = true;
                            responseMessage.value = "اطلاعات شما قبلا ثبت شده است. منتظر تماس کارشناسان ما باشید.";
                            responseState.value = "error";
                            timer.value = 3000;
                            const myInterval = setInterval(() => myTimer(myInterval), 100);
                        } else if (error.response.data.status == 500) {
                            responseShow.value = true;
                            responseMessage.value = "خطایی سمت سرور رخ داده است. لطفا بعدا امتحان کنید.";
                            responseState.value = "error";
                            timer.value = 3000;
                            const myInterval = setInterval(() => myTimer(myInterval), 100);
                        }
                    })
                    .finally(function () {
                        // always executed
                    });
            }
        }

        return {
            showModal,
            closeModal,
            OpenModal,
            counselingStep,
            loanOrder,
            loanInitialValue,
            loanMin,
            loanMax,
            numberWithCommas,
            priceSliderBackground,
            loanSteps,
            paymentDuration,
            trueInformationState,
            loanPerMonth,
            refund,
            fund,
            modalState,
            closeModalState,
            informationState,
            closeInformationState,
            changeCounselingStep,
            loanOptions,
            formatValue,
            categoryList,
            categoryType,
            phoneAlert,
            nameAlert,
            categoryAlert,
            facilityAlert,
            submitForm,
            fullname,
            phone,
            responseState,
            responseMessage,
            responseShow,
            profitState,
            customProfit,
            paymentDurationView,
            // calculateValues,
            activeToolsButtons,
            checkProfit,
            profitAlert,
            decreasePercent,
            increasePercent,
        }
    }
}
</script>
