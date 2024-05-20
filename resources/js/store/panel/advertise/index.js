import { defineStore } from 'pinia';
import {minTextareaLimitation, textInputLimitation} from "@/components/helper/common.js";

export const useAdvertise = defineStore('advertise', {
    state: () => {
        return {
            step: 0,
            category: null,
            flow: null,
            categoryChildren: {},
            selectedCategory: null,
            usageList: [],
            defaultSelectedUsage: 0,
            defaultBrandId: 0,
            defaultModelId: 0,
            selectedUsage: null,
            specifications: null,
            selectedSpecificationValues: {},
            description: "",
            title: "",
            price: "",
            city: "",
            brand: {},
            model: {},
            primaryImage: null,
            primaryImageSrc: null,
            sliderImages: null,
            sliderImagesSrc: [],
            titleErrorMessage: "",
            priceErrorMessage: "",
            modelErrorMessage: "",
            cityErrorMessage: "",
            imageErrorMessage: "",
            imagesErrorMessage: "",
            descriptionErrorMessage: "",
            brandErrorMessage: "",
        }
    },
    actions: {
        saveCategoryMain(data){
            this.category = data;
        },
        saveFlow(id){
            this.flow = id;
        },
        saveCategoryChildren(value){
            this.categoryChildren = value;
            this.saveFlow(value.id);
        },
        saveSelectedCategory(obj){
            this.selectedCategory = obj;
        },
        saveUsages(obj){
            this.usageList = obj;
        },
        saveUsage(obj){
            this.selectedUsage = obj;
        },
        saveSpecifications(list){
            this.specifications = list;
        },
        emptySpecificationValues(){
            this.selectedSpecificationValues = {};
        },
        initializeSpecificationValues(value, required, title, id, type) {
            const obj = {
                required: required,
                id: value,
                title: title,
                type: type,
            };

            this.selectedSpecificationValues[id] = obj;
        },
        emptySliderImagesSrc(){
            this.sliderImagesSrc.length = 0;
        },
        // initializeSpecificationValue(item){
        //     this.specifications.map(spec => {
        //         if(spec.id == item.parentId){
        //         console.log(item)
        //         }
        //     })
        // },
        checkAllSpecFilled(){
            let status = true;
            for (const key of Object.keys(this.selectedSpecificationValues)) {
                // console.log(key, this.selectedSpecificationValues[key].id != null, this.selectedSpecificationValues[key].id !== '');
                if (this.selectedSpecificationValues[key].required == 0) {
                    continue; // Skip to the next iteration if not required.
                } else if (this.selectedSpecificationValues[key].id == null || this.selectedSpecificationValues[key].id === '') {
                    status = false;
                    break; // Exit loop if condition is not met.
                }
            }
            return status;
        },
        checkAllInfoFilled(){
            let status = false;
            const importantInformation = {
                category: this.selectedCategory.id,
                usage: this.selectedUsage.id,
                title: this.title,
                price: this.price,
                description: this.description,
                city: this.city.id,
                brand: this.brand.id,
                model: this.model.id,
            }
            for (const [key, value] of Object.entries(importantInformation)) {
                // console.log(key, value)
                if(key === 'description' && value.toString().length >= minTextareaLimitation){
                    status = true;
                } else if(key === 'title' && value.toString().length <= textInputLimitation && value.toString().length != 0){
                    status = true;
                } else if(key === 'city' && typeof value !== 'undefined'){
                    status = true;
                } else if(key === 'category' && value != 0){
                    status = true;
                } else if(key === 'usage' && value != 0){
                    status = true;
                } else if(key === 'price' && value != 0){
                    status = true;
                } else if(key === 'brand' && typeof value !== 'undefined'){
                    status = true;
                } else if(key === 'model' && typeof value !== 'undefined'){
                    // console.log(value);
                    status = true;
                } else {
                    status = false;
                    return status;
                }
            }
            return status;
        },
        saveDescription(string){
            this.description = string;
        },
        saveTitle(string){
            this.title = string;
        },
        savePrice(num){
            this.price = num;
        },
        saveCity(id){
            this.city = id;
        },
        saveModel(obj){
            this.model = obj;
        },
        saveBrand(obj){
            this.brand = obj;
        },
        savePrimaryImage(file){
            this.primaryImage = file;
        },
        savePrimaryImageSrc(src){
            this.primaryImageSrc = src;
        },
        saveSliderImages(files){
            this.sliderImages = files;
        },
        saveSliderImagesSrc(src){
            this.sliderImagesSrc.push(src);
        },
        changeStep(step){
            this.step = step;
        },
        handleTitleError(message){
            this.titleErrorMessage = message;
        },
        handlePriceError(message){
            this.priceErrorMessage = message;
        },
        handleCityError(message){
            this.cityErrorMessage = message;
        },
        handleDescriptionError(message){
            this.descriptionErrorMessage = message;
        },
        handleBrandError(message){
            this.brandErrorMessage = message;
        },
        handleModelError(message){
            this.modelErrorMessage = message;
        },
        resetData(step){
            switch (step){
                case (1):
                    this.selectedUsage = null;
                    this.selectedCategory = null;
                    this.defaultSelectedUsage += 1;
                    this.specifications = null;
                    this.selectedSpecificationValues = {};
                    this.title = "";
                    this.price = "";
                    this.defaultBrandId += 1;
                    this.defaultModelId += 1;
            }
        }
    },
});
