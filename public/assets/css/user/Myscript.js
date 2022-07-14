let nama = document.getElementById("nama");
let email = document.getElementById("email");
let subject = document.getElementById("subject")
let message = document.getElementById("message");
let sendbtn = document.getElementById("send");
let tbinput = document.getElementById("tb_input");
let data = [];

sendbtn.addEventListener("click",
    function () {
        SaveData();
    });

function SaveData() {
    console.log("Button Ditekan");

    if (localStorage.getItem("penyimpanan") === null) {
        localStorage.setItem("penyimpanan", JSON.stringify([{
            "name": nama.value,
            "email": email.value,
            "subject": subject.value,
            "message": message.value
        }]));
    } else {
        let datasebelumnya = JSON.parse(localStorage.getItem("penyimpanan"));
        datasebelumnya.push({
            "name": nama.value,
            "email": email.value,
            "subject": subject.value,
            "message": message.value
        });
        localStorage.setItem("penyimpanan", JSON.stringify(datasebelumnya));
    }
    tbinput.innerHTML = "",
        getData
}

getData();

function getData() {
    let dataLS = JSON.parse(localStorage.getItem("penyimpanan"));
    dataLS.forEach(showData);
}

function showData(value, index) {
    tbinput.innerHTML += "<tr><td>" +
        value.nama + "</td><td>" + value.email +
        "</td><td>" + value.subject + "</td><td>" +
        value.message + "</td></tr>";
}

