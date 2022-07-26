// import './bootstrap';
require("./bootstrap");

//escuchamos a un canal
//para un canal publico
// Echo.channel("notifications").listen("UserSessionChanged", (e) => {
//para un canal privado -> solo con user atenticado
Echo.private("notifications").listen("UserSessionChanged", (e) => {
    //hacemos la referencia al id que pusimo en el layout
    const notificationElement = document.getElementById("notification");

    notificationElement.innerText = e.message;

    notificationElement.classList.remove("invisible");
    notificationElement.classList.remove("alert-success");
    notificationElement.classList.remove("alert-danger");

    notificationElement.classList.add("alert-" + e.type);
});
