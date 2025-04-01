import { mySwiper } from "./modules/swiperSlider";
import { menuToggle } from "./modules/menu";
import { inputPhone } from "./modules/form";
import { formhandler } from "./modules/formhandler";
document.addEventListener("DOMContentLoaded", () => {
    mySwiper();
    menuToggle();
    inputPhone();
    formhandler();
});
