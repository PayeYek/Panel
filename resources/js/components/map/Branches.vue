<template>
    <li class="flex flex-col">
        <div class="flex_between gap-4">
            <p
                class="pr-4 leading-8 relative text-normal text-base font-medium before:absolute before:content-[''] before:w-1 before:h-full before:top-0 before:right-0 before:rounded-l before:bg-normal">
                نمایندگی {{ BranchNumberStatus ? '2111' : '' }} تهران </p>
            <div class="cursor-pointer p-0.5" @click="toggleBranchVisiblity">
                <svg :class="'stroke-normal size-6 duration-300 ' + (branchState ? 'rotate-180' : '')"
                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 9L12 14L7 9" stroke="current" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
        </div>
        <section :class="'flex flex-col gap-4 overflow-hidden duration-300 ' + (branchState ? ' max-h-[32rem] py-4' : ' max-h-0 py-0')">
            <div class="p-4 rounded-custom border border-stone-700/20">
                <!-- title -->
                <p class="text-base font-medium text-stone-700 mb-4"> شعبه مرکزی </p>
                <section>
                    <!-- location -->
                    <div class="flex items-start gap-3.5 mb-4">
                        <svg class="size-6 stroke-normal" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0013 21.5984C12.0013 21.5984 19.5144 14.9202 19.5144 9.91148C19.5144 5.76214 16.1507 2.39844 12.0013 2.39844C7.85199 2.39844 4.48828 5.76214 4.48828 9.91148C4.48828 14.9202 12.0013 21.5984 12.0013 21.5984Z"
                                stroke="current" stroke-width="2" />
                            <path
                                d="M14.4016 9.59859C14.4016 10.9241 13.3271 11.9986 12.0016 11.9986C10.6761 11.9986 9.60163 10.9241 9.60163 9.59859C9.60163 8.27311 10.6761 7.19859 12.0016 7.19859C13.3271 7.19859 14.4016 8.27311 14.4016 9.59859Z"
                                stroke="current" stroke-width="2" />
                        </svg>
                        <p class="text-base font-normal text-stone-700 leading-7"> تهران، اشرفی اصفهانی، برج نگین رضا، واحد
                            112 </p>
                    </div>
                    <!-- phone -->
                    <a href="tel:02144000990" class="flex items-start gap-3.5 mb-2">
                        <svg class="size-6 stroke-normal" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.7715 3.33814C18.7715 3.33814 19.9095 4.4968 20.2432 4.78074C20.7367 5.24329 20.9698 5.78828 20.9698 6.50271C20.9698 6.5714 20.9698 6.64468 20.9653 6.71337C20.8784 8.07355 20.3483 9.33754 19.8958 10.2855C18.6435 12.8776 16.8657 15.1538 14.6125 17.0452C12.7341 18.6069 10.9974 19.651 9.13265 20.3426C7.99464 20.7685 7.10799 20.9242 6.27162 20.8555C5.73689 20.8097 5.29357 20.6036 4.91423 20.2235L3.35574 18.6618C3.14551 18.4374 3.03125 18.1993 3.03125 17.9657C3.03125 17.6772 3.20492 17.4436 3.35117 17.2971C3.35574 17.2925 3.36031 17.2879 3.36489 17.2833C3.62539 17.004 3.89504 16.7383 4.18298 16.459C4.32923 16.317 4.47548 16.1705 4.6263 16.0239L5.874 14.7736C6.35846 14.2882 6.80635 14.2882 7.29081 14.7736C7.42335 14.9065 7.55589 15.0347 7.68386 15.1675C8.0769 15.5522 7.77532 15.25 8.13181 15.6484C8.14095 15.6576 8.14552 15.6667 8.15466 15.6713C8.54771 16.0652 8.93162 15.9919 9.19213 15.9095C9.20584 15.9049 9.21955 15.9003 9.23326 15.8957C10.0194 15.5706 10.7598 15.1126 11.6418 14.4165L11.6464 14.4119C13.2003 13.1479 14.4115 11.8152 15.3392 10.3451C15.4581 10.1574 15.554 9.96502 15.6454 9.78183C15.7277 9.61696 15.8054 9.46126 15.8877 9.32844C15.8968 9.31013 15.9105 9.29181 15.9197 9.27349C15.9974 9.11778 16.0339 8.97123 16.0339 8.8201C16.0339 8.43998 15.7963 8.20184 15.7186 8.12398L14.8227 7.2263C14.6673 7.07059 14.48 6.82329 14.48 6.53477C14.48 6.25082 14.6582 6.01726 14.8136 5.87529C14.8182 5.87071 14.8182 5.87071 14.8227 5.86613L17.341 3.34272C17.8072 2.87101 18.7715 3.33814 18.7715 3.33814Z"
                                stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="text-base font-normal text-stone-700 leading-7"> 021-44000990 </p>
                    </a>
                    <!-- address on utilities -->
                    <a href="geo:35.7330071,51.3335077" class="text-[#1EA0FF] text-base font-medium underline underline-offset-[6px]"> مسیریابی </a>
                </section>
            </div>
            <div class="p-4 rounded-custom border border-stone-700/20">
                <!-- title -->
                <p class="text-base font-medium text-stone-700 mb-4"> شعبه اسلامشهر </p>
                <section>
                    <!-- location -->
                    <div class="flex items-start gap-3.5 mb-4">
                        <svg class="size-6 stroke-normal" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0013 21.5984C12.0013 21.5984 19.5144 14.9202 19.5144 9.91148C19.5144 5.76214 16.1507 2.39844 12.0013 2.39844C7.85199 2.39844 4.48828 5.76214 4.48828 9.91148C4.48828 14.9202 12.0013 21.5984 12.0013 21.5984Z"
                                stroke="current" stroke-width="2" />
                            <path
                                d="M14.4016 9.59859C14.4016 10.9241 13.3271 11.9986 12.0016 11.9986C10.6761 11.9986 9.60163 10.9241 9.60163 9.59859C9.60163 8.27311 10.6761 7.19859 12.0016 7.19859C13.3271 7.19859 14.4016 8.27311 14.4016 9.59859Z"
                                stroke="current" stroke-width="2" />
                        </svg>
                        <p class="text-base font-normal text-stone-700 leading-7"> اسلامشهر، میدان نماز، خیابان عباس آباد، پلاک 8 </p>
                    </div>
                    <!-- phone -->
                    <a href="tel:02191006663" class="flex items-start gap-3.5 mb-2">
                        <svg class="size-6 stroke-normal" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.7715 3.33814C18.7715 3.33814 19.9095 4.4968 20.2432 4.78074C20.7367 5.24329 20.9698 5.78828 20.9698 6.50271C20.9698 6.5714 20.9698 6.64468 20.9653 6.71337C20.8784 8.07355 20.3483 9.33754 19.8958 10.2855C18.6435 12.8776 16.8657 15.1538 14.6125 17.0452C12.7341 18.6069 10.9974 19.651 9.13265 20.3426C7.99464 20.7685 7.10799 20.9242 6.27162 20.8555C5.73689 20.8097 5.29357 20.6036 4.91423 20.2235L3.35574 18.6618C3.14551 18.4374 3.03125 18.1993 3.03125 17.9657C3.03125 17.6772 3.20492 17.4436 3.35117 17.2971C3.35574 17.2925 3.36031 17.2879 3.36489 17.2833C3.62539 17.004 3.89504 16.7383 4.18298 16.459C4.32923 16.317 4.47548 16.1705 4.6263 16.0239L5.874 14.7736C6.35846 14.2882 6.80635 14.2882 7.29081 14.7736C7.42335 14.9065 7.55589 15.0347 7.68386 15.1675C8.0769 15.5522 7.77532 15.25 8.13181 15.6484C8.14095 15.6576 8.14552 15.6667 8.15466 15.6713C8.54771 16.0652 8.93162 15.9919 9.19213 15.9095C9.20584 15.9049 9.21955 15.9003 9.23326 15.8957C10.0194 15.5706 10.7598 15.1126 11.6418 14.4165L11.6464 14.4119C13.2003 13.1479 14.4115 11.8152 15.3392 10.3451C15.4581 10.1574 15.554 9.96502 15.6454 9.78183C15.7277 9.61696 15.8054 9.46126 15.8877 9.32844C15.8968 9.31013 15.9105 9.29181 15.9197 9.27349C15.9974 9.11778 16.0339 8.97123 16.0339 8.8201C16.0339 8.43998 15.7963 8.20184 15.7186 8.12398L14.8227 7.2263C14.6673 7.07059 14.48 6.82329 14.48 6.53477C14.48 6.25082 14.6582 6.01726 14.8136 5.87529C14.8182 5.87071 14.8182 5.87071 14.8227 5.86613L17.341 3.34272C17.8072 2.87101 18.7715 3.33814 18.7715 3.33814Z"
                                stroke="current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="text-base font-normal text-stone-700 leading-7"> 021-91006663 </p>
                    </a>
                    <!-- address on utilities -->
                    <a href="geo:35.5664514,51.2684246" class="text-[#1EA0FF] text-base font-medium underline underline-offset-[6px]"> مسیریابی </a>
                </section>
            </div>
        </section>
    </li>
</template>

<script>
import { ref } from 'vue';

export default {
    name: 'Branches',
    props: {
        borderStyle: {
            type: String,
            required: false,
        },
    },

    setup() {
        const branchState = ref(true);

        const toggleBranchVisiblity = () => {
            branchState.value = !branchState.value;
        }

        const BranchNumberStatus = ref(window.location.href.includes("arian-diesel"))

        return {
            branchState,
            toggleBranchVisiblity,
            BranchNumberStatus,
        }
    }
}
</script>