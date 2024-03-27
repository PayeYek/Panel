<template>
    <main class="default_container grid grid-cols-4 font-yekan pt-4 relative mb-8 sm:mb-24 lg:mb-28">
        <section class="">
            <ul class="flex flex-col items-start gap-2 text-sm font-medium list-none *:px-4 *:h-7 *:flex *:items-center">
                <li v-for="(type, index) in wizard" :key="index" @click="changeStepByIndex(type.name)"
                    :class="'border border-stone-400 rounded-full ' + (type.value == null ? 'pointer-events-none' : 'cursor-pointer bg-normal text-white')">
                    {{ type.value == null ? type.label : type.value }}
                </li>
            </ul>
        </section>

        <section class="col-span-3">
            <div class="flex flex-col" v-if="steps === 'brand'">
                <label :for="car.id" v-for="(car, index) in brands"
                    class="border-b last:border-b-0 border-stone-400 h-10 flex_between px-4 cursor-pointer"
                    :key="index">
                    <input type="radio" name="brandTypes" :value="car.name" :id="car.id" class="hidden"
                        @click="changeStepValueByName(car.name, car.label, 'usage')" />
                    <p> {{ car.name }} </p>
                </label>
            </div>
            <!-- model -->
            <div class="flex flex-col" v-if="steps === 'model'">
                <label :for="car.id" v-for="(car, index) in models"
                    class="border-b last:border-b-0 border-stone-400 h-10 flex_between px-4 cursor-pointer"
                    :key="index">
                    <input type="radio" name="modelTypes" :value="car.name" :id="car.id" class="hidden"
                        @click="changeStepValueByName(car.name, car.label, 'date')" />
                    <p> {{ car.name }} </p>
                </label>
            </div>
            <!-- year -->
            <div class="flex flex-col" v-if="steps === 'date'">
                <label :for="car.id" v-for="(car, index) in years"
                    class="border-b last:border-b-0 border-stone-400 h-10 flex_between px-4 cursor-pointer"
                    :key="index">
                    <input type="radio" name="dateCreated" :value="car.name" :id="car.id" class="hidden"
                        @click="changeStepValueByName(car.name, car.label, 'tip')" />
                    <p> {{ car.name }} </p>
                </label>
            </div>
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

const carBrands = [
    { id: 1, name: "Toyota", label: "brand" },
    { id: 2, name: "Honda", label: "brand" },
    { id: 3, name: "Ford", label: "brand" },
    { id: 4, name: "Chevrolet", label: "brand" },
    { id: 5, name: "BMW", label: "brand" },
    { id: 6, name: "Mercedes-Benz", label: "brand" },
    { id: 7, name: "Audi", label: "brand" },
    { id: 8, name: "Nissan", label: "brand" },
    { id: 9, name: "Hyundai", label: "brand" },
    { id: 10, name: "Kia", label: "brand" },
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
        const steps = ref("brand");
        const wizard = ref(WizardDefault);
        const brands = ref(carBrands);
        const models = ref(toyotaModels);
        const years = ref(carYear);

        const changeStepByIndex = (step) => {
            steps.value = step;
        };

        const changeStepValueByName = (value, name, model) => {
            const index = wizard.value.findIndex(item => item.name === name);
            console.log(value, name, model);
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




        return {
            // carTypes: filterType.value,
            // carAttributes,
            // toyotaModels,
            // selectFilter,
            // type,
            steps,
            // model,
            // carYear,
            // goToStep,
            wizard,
            changeStepByIndex,
            changeStepValueByName,
            brands,
            models,
            years,
        }
    }
}
</script>