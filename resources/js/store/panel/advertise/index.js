import { defineStore } from 'pinia';

export const useAdvertise = defineStore('advertise', {
    state: () => {
        return {
            step: 0,
            category: null,
            flow: null,
            categoryChildren: {},
            selectedCategory: null,
            usageList: [],
            selectedUsage: null,
            specifications: null,
            selectedSpecificationValues: {},
            description: "",
            title: "",
            price: "",
            city: "",
            primaryImage: null,
            sliderImages: null,
            titleErrorMessage: "",
            priceErrorMessage: "",
            cityErrorMessage: "",
            imageErrorMessage: "",
            imagesErrorMessage: "",
            descriptionErrorMessage: "",
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
        initializeSpecificationValue(item){
            this.specifications.map(spec => {
                if(spec.id == item.parentId){
                console.log(item)
                }
            })
        },
        checkAllSpecFilled(){
            let status = false;
            Object.keys(this.selectedSpecificationValues).forEach(key => {
                if(this.selectedSpecificationValues[key].required == 0){
                    status = true;
                } else if(this.selectedSpecificationValues[key].id == 0 || this.selectedSpecificationValues[key].id === '') {
                    status = false
                    return false;
                }
            })
            return status;
        },
        checkAllInfoFilled(){
            let status = false;
            const importantInformation = {
                category: this.selectedCategory,
                usage: this.selectedUsage,
            }
            // Object.keys(this.selectedSpecificationValues).forEach(key => {
            //     if(this.selectedSpecificationValues[key].required == 0){
            //         status = true;
            //     } else if(this.selectedSpecificationValues[key].id == 0 || this.selectedSpecificationValues[key].id === '') {
            //         status = false
            //         return false;
            //     }
            // })
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
        savePrimaryImage(file){
            this.primaryImage = file;
        },
        saveSliderImages(files){
            this.sliderImages = files;
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
    },
});
