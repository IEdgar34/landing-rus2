import IMask from "imask";
const element = document.getElementById("phone");

export const inputPhone = () => {
    element.addEventListener("input", function (e) {
        this.value = this.value.replace(/[^\d]/g, ""); 
    });
    const maskOptions = {
        mask: "+{000}-(00)-000-00-00",
    };
    const mask = IMask(element, maskOptions);
    element.addEventListener("click", () => {
        mask.updateValue("");
    });
};
