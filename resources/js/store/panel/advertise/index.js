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
        }
    },
});
