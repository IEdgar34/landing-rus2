export const formhandler = () => {
    const form = document.querySelector(".form");
    async function sender(e) {
        try {
            const form = e.target;
            const formData = new FormData(form);
            const response = await fetch("mail.php", {
                method: "POST",
                body: formData,
            });

            let c = await response.text();
            let str = c
                .split(/\n/)[0]
                .replace(/<br\s*\/?>/gi, " ")
                .replace(/\s+/g, " ")
                .replace(/^ | $/g, "");
            console.log(c);
            if (str === "Сообщение успешно отправлено") {
                alert("Сообщение успешно отправлено");
                form.querySelectorAll("input").forEach((item) => (item.value = ""));
                form.querySelectorAll("textarea").forEach((item) => (item.value = ""));
            } else if (str === "При отправке сообщения возникли ошибки, все поля обязательны к заполнению") {
                throw new Error("При отправке сообщения возникли ошибки, все поля обязательны к заполнению");
            } else if (str === "Заполните поля имени и способа связи") {
                alert("Заполните поля имени и способа связи");
            }
        } catch (err) {
            console.log(err);
        }
    }

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        sender(e);
    });
};
