export const menuToggle = () => {
    const btn = document.querySelector(".burger")
    const menu = document.querySelector(".nav")


    btn.addEventListener("click",toggle)

    function toggle(){
        menu.classList.toggle("nav_active")
        btn.classList.toggle("burger_active")
    }
}