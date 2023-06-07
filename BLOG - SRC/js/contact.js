/* İLETİŞİM */

const form = document.querySelector("form"),
statusTxt = form.querySelector(".button-area span");

form.onsubmit = (e)=>{
    e.preventDefault();
    statusTxt.style.display = "block";
    statusTxt.style.color = "#fff";

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "message.php", true);
    xhr.onload = () => {
        if(xhr.readyState == 4 && xhr.status == 200) {
           
            let response = xhr.response;
            if(response.indexOf("Formdaki tüm bilgiler girilmelidir!") != -1 || response.indexOf("Lütfen geçerli bir e-posta adresi girin!") || response.indexOf("Üzgünüz, mesajınız gönderilemedi.")) {
                statusTxt.style.color = "red";
            } else {
                form.reset();
                setTimeout(() => {
                    statusTxt.style.display = "none";
                }, 3000);
            }
            statusTxt.innerText = response;
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}