import { defineStore } from 'pinia';

export const useAdvertise = defineStore('advertise', {
    state: () => {
        return {
            category: null,
            categoryChildren: {},
        }
    },
    actions: {
        saveCategoryMain(data){
            this.category = data;
        },
        saveCategoryChildren(value){
            this.categoryChildren = value;
        }
    },
});
