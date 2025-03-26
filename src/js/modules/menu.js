export const menuToggle = () => {
    const btn = document.querySelector(".burger");
    const menu = document.querySelector(".nav");
    const linkList = document.querySelectorAll(".nav__menu_link");

    btn.addEventListener("click", toggle);
    linkList.forEach((item) => {
        item.addEventListener("click", (e) => {
            menu.classList.remove("nav_active");
            btn.classList.remove("burger_active");
        })
    })

    function toggle() {
        menu.classList.toggle("nav_active");
        btn.classList.toggle("burger_active");
    }
};
