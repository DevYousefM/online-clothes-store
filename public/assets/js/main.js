let minus = document.getElementById("minus"),
    plus = document.getElementById("plus"),
    qtn = document.getElementById("qtn"),
    price = document.getElementById("price"),
    total = document.getElementById("total");
if (total) {
    total.innerText = price.innerText;
}
if (minus) {
    minus.addEventListener("click", () => {
        qtn.value > 0 ? qtn.value-- : qtn.value;
        total.innerText = price.innerText * qtn.value;
    });
    plus.addEventListener("click", () => {
        qtn.value++;
        total.innerText = price.innerText * qtn.value;
    });
}
if (document.getElementById("result")) {
    let result = document.getElementById("result");
    setTimeout(() => {
        result.remove();
    }, 4000);
}
let company = document.getElementById("company"),
    user = document.getElementById("user"),
    company_info = document.getElementById("company_info");
if (company) {
    company.addEventListener("change", (e) => {
        if (e.target.value == "company") {
            company_info.style.display = "flex";
        }
    });
    user.addEventListener("change", (e) => {
        if (e.target.value == "user") {
            company_info.style.display = "none";
        }
    });
}
