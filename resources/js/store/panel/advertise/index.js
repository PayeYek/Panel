import { defineStore } from 'pinia';

export const useAdvertise = defineStore('advertise', {
    state: () => ({
        category: {
            response: [{
                id: 1,
                title: "خودرو",
                children: [
                    {
                        id: 1,
                        title: "اتوبوس و مینی بوس",
                        children: [
                            {
                                id: 1,
                                title: "اتوبوس شهری",
                            },
                            {
                                id: 1,
                                title: "مینی بوس",
                            },
                        ]
                    },
                    {
                        id: 2,
                        title: "کامیون و کشنده",
                        children: [
                            {
                                id: 1,
                                title: "کامیون",
                            },
                            {
                                id: 1,
                                title: "کشنده",
                            },
                        ]
                    },
                ],
            },
                {
                    id: 2,
                    title: "قطعات",
                    children: [
                        {
                            id: 1,
                            title: "گیربکس",
                            children: [
                                {
                                    id: 1,
                                    title: "شفت",
                                },
                                {
                                    id: 2,
                                    title: "دیشلی",
                                },
                            ]
                        },
                        {
                            id: 2,
                            title: "موتور",
                            children: [
                                {
                                    id: 1,
                                    title: "پیستون",
                                },
                                {
                                    id: 2,
                                    title: "شاتون",
                                },
                            ]
                        },
                    ],
                }]
        },
    }),
    actions: {
        saveCategoryMain(category){
            category.category = category;
        }
    },
});
