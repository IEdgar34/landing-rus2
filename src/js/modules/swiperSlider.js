import Swiper from "swiper";

import "swiper/css";
import { Navigation, Pagination } from "swiper/modules";
export const mySwiper = () => {
    const swiper = new Swiper(".swiper", {
        // Optional parameters
        loop: true,

        // If we need pagination
        /*  pagination: {
            el: ".swiper-pagination",
        }, */
        modules: [Navigation, Pagination],
        // Navigation arrows
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        // And if we need scrollbar
        scrollbar: {
            el: ".swiper-scrollbar",
        },
    });
};
