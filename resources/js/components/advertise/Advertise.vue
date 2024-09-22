<template>
    <main class="lg:default_container grid grid-cols-1 lg:grid-cols-4 gap-4 font-yekan pt-4 relative mb-8 sm:mb-24 lg:mb-28">
        <section class="">
            <ul class="flex flex-row snap-x items-center lg:flex-col lg:items-start lg:gap-2 text-sm font-medium list-none *:px-4 *:h-7 *:flex *:items-center overflow-auto pb-2">
                <li v-for="(type, index) in wizard" :key="index" @click="changeStepByIndex(type.name)" :id="'tabIndex-'+index"
                    :class="'px-4 lg:px-0 border-b-2 flex-none snap-center lg:border-b-0 lg:pr-6 before:absolute lg:relative before:hidden before:top-1/2 before:-translate-y-1/2 before:size-[11px] before:rounded-full before:right-0 lg:before:block after:absolute after:hidden after:w-px after:h-10 after:top-1/2 after:right-[5px] lg:after:block before:z-[1] lg:last:after:hidden ' + (steps !== type.name && type.value == null ? 'pointer-events-none text-gray-500 border-b-gray-300 before:bg-gray-300 after:bg-gray-300' : 'cursor-pointer text-blue-600 border-b-blue-600 before:bg-blue-600 after:bg-blue-600')">
                    {{ type.value == null ? type.label : type.value }}
                </li>
            </ul>
        </section>

        <section class="lg:col-span-3">
            <div class="flex flex-col text-stone-700 text-sm font-medium lg:text-base" v-if="steps === 'type'">
                <label :for="'type-' + car.name" v-for="(car, index) in vehicleTypes"
                    class="border-b border-stone-400 h-10 lg:h-12 flex_between px-4 cursor-pointer lg:hover:bg-stone-200"
                    :key="index">
                    <input type="radio" name="brandTypes" :value="car.name" :id="'type-' + car.name" class="hidden"
                        @click="changeStepValueByName(car.name, car.label, 'usage')" />
                    <p> {{ car.name }} </p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                    </svg>
                </label>
                <!-- add new -->
                <section class="h-12 flex items-center px-4">
                    <!-- add btn -->
                    <button class="flex items-center gap-4 border border-stone-400 h-10 px-5 rounded-md hover:bg-stone-200" type="button" v-if="!addType" @click="addNewType">
                        <!-- icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <p class="text-sm"> افزودن </p>
                    </button>
                    <!-- add input -->
                    <section class="flex items-center justify-between group/input" v-if="addType">
                        <label for="add-new" class="flex rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm group-focus-within/input:ring-1 group-focus-within/input:ring-primary-500 group-focus-within/input:border-primary-500 transition duration-200">
                            <input type="text" id="add-new" class="min-h-[2.5rem] px-3 block bg-gray-50 rounded-lg dark:bg-gray-700 w-64 border-transparent focus:border-transparent focus:outline-none focus:ring-0 dark:placeholder-gray-400" />
                        </label>
                    </section>
                </section>
            </div>
            <!-- usage -->
            <div class="flex flex-col" v-if="steps === 'usage'">
                <label :for="car.id" v-for="(car, index) in vehicleUsages"
                    class="border-b last:border-b-0 border-stone-400 h-10 flex_between px-4 cursor-pointer"
                    :key="index">
                    <input type="radio" name="usageTypes" :value="car.name" :id="car.id" class="hidden"
                        @click="changeStepValueByName(car.name, car.label, 'usage subcategory')" />
                    <p> {{ car.name }} </p>
                </label>
            </div>
            <!-- model -->
            <!-- <div class="flex flex-col" v-if="steps === 'model'">
                <label :for="car.id" v-for="(car, index) in models"
                    class="border-b last:border-b-0 border-stone-400 h-10 flex_between px-4 cursor-pointer"
                    :key="index">
                    <input type="radio" name="modelTypes" :value="car.name" :id="car.id" class="hidden"
                        @click="changeStepValueByName(car.name, car.label, 'date')" />
                    <p> {{ car.name }} </p>
                </label>
            </div> -->
            <!-- year -->
            <!-- <div class="flex flex-col" v-if="steps === 'date'">
                <label :for="car.id" v-for="(car, index) in years"
                    class="border-b last:border-b-0 border-stone-400 h-10 flex_between px-4 cursor-pointer"
                    :key="index">
                    <input type="radio" name="dateCreated" :value="car.name" :id="car.id" class="hidden"
                        @click="changeStepValueByName(car.name, car.label, 'tip')" />
                    <p> {{ car.name }} </p>
                </label>
            </div> -->
        </section>
    </main>
</template>

<script>
import { ref } from 'vue';

const createWizardItem = (name, value, label) => ({ name, value, label });

const names = [
    "type",
    "usage",
    "usage subcategory",
    "brand",
    "model",
    "trim",
    "date",
    "gearbox",
    "distanceTraveled",
    "body",
    "price",
    "images",
    "agreement"
];

const values = [
    "نوع",
    "کاربری",
    "زیردسته کاربری",
    "برند",
    "مدل",
    "تریم",
    "سال",
    "گیربکس",
    "کارکرد",
    "بدنه",
    "قیمت",
    "تصاویر",
    "ثبت"
];

// const types = [
//     { id: 1, name: "Toyota", label: "type" },
//     { id: 2, name: "Honda", label: "type" },
//     { id: 3, name: "Ford", label: "type" },
//     { id: 4, name: "Chevrolet", label: "type" },
//     { id: 5, name: "BMW", label: "type" },
//     { id: 6, name: "Mercedes-Benz", label: "type" },
//     { id: 7, name: "Audi", label: "type" },
//     { id: 8, name: "Nissan", label: "type" },
//     { id: 9, name: "Hyundai", label: "type" },
//     { id: 10, name: "Kia", label: "type" },
// ];

const usages = [
    { id: 'usage1', name: 'کمپرسی', label: 'usage' },
    { id: 'usage2', name: 'لبه', label: 'usage' },
    { id: 'usage3', name: 'بونکر', label: 'usage' },
    { id: 'usage4', name: 'سواری کش', label: 'usage' },
    { id: 'usage5', name: 'تانکر', label: 'usage' },
];

const toyotaModels = [
    { id: 'toyota1', name: 'Camry', label: 'model' },
    { id: 'toyota2', name: 'Corolla', label: 'model' },
    { id: 'toyota3', name: 'Rav4', label: 'model' },
    { id: 'toyota4', name: 'Prius', label: 'model' },
    { id: 'toyota5', name: 'Highlander', label: 'model' },
    { id: 'toyota6', name: 'Tacoma', label: 'model' },
    { id: 'toyota7', name: 'Sienna', label: 'model' },
    { id: 'toyota8', name: 'Tundra', label: 'model' },
    { id: 'toyota9', name: 'Yaris', label: 'model' },
    { id: 'toyota10', name: 'Avalon', label: 'model' }
];

const carYear = [
    { id: '2012', name: '2012', label: 'date' },
    { id: '2013', name: '2013', label: 'date' },
    { id: '2014', name: '2014', label: 'date' },
];

const WizardDefault = names.map((name, index) => createWizardItem(name, null, values[index]));

export default {
    name: 'Advertise',
    setup() {
        const steps = ref("type");
        const addType = ref(false);
        const wizard = ref(WizardDefault);
        const vehicleTypes = ref([
            { name: "Toyota", label: "type" },
            { name: "Honda", label: "type" },
            { name: "Ford", label: "type" },
            { name: "Chevrolet", label: "type" },
            { name: "BMW", label: "type" },
            { name: "Mercedes-Benz", label: "type" },
            { name: "Audi", label: "type" },
            { name: "Nissan", label: "type" },
            { name: "Hyundai", label: "type" },
            { name: "Kia", label: "type" },
        ]);
        const vehicleUsages = ref(usages);
        const models = ref(toyotaModels);
        const years = ref(carYear);

        const changeStepByIndex = (step) => {
            steps.value = step;
        };

        const changeStepValueByName = (value, name, model) => {
            const index = wizard.value.findIndex(item => item.name === name);
            document.getElementById(`tabIndex-${index}`).scrollIntoView({
                behavior: 'smooth',
                inline: 'center',
                block: 'center',
            })
            wizard.value[index].value = value;
            steps.value = model;
            resetNextValues(value, index);
        };

        const resetNextValues = (value, index) => {
            const changeStep = (value, index) => prevState => {
                const prevSteps = prevState.slice(0, index);
                const futureSteps = WizardDefault.slice(index + 1);
                futureSteps.map(p => p.value = null);
                return [...prevSteps, value, ...futureSteps];
            };

            // wizard.value = changeStep(value, index)(wizard.value);
            changeStep(value, index)(wizard.value);
        }

        const addNewType = () => {
            addType.value = true;
        }


        return {
            addType,
            addNewType,
            steps,
            wizard,
            changeStepByIndex,
            changeStepValueByName,
            vehicleTypes,
            vehicleUsages,
            models,
            years,
        }
    }
}
</script>