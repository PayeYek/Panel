import { defineStore } from 'pinia';

export const useAdvertise = defineStore('advertise', {
    state: () => {
        return {
            category: null,
            flow: null,
            categoryChildren: {},
            selectedCategory: null,
            usageList: [],
            selectedUsage: null,
            specifications: null,
            selectedSpecificationValues: {},
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
        initializeSpecificationValues(value, required, title, id) {
            const obj = {
                required: required,
                id: value,
                title: title,
                // parentId: id,
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
            this.selectedSpecificationValues.map(item => {
                console.log(item)
            })
        }
    },
});
