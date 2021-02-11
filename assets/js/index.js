const calculTTC = (prix, tax) => {
    return +(prix * tax / 100) + +prix
}
const ajouterElem = (e) => {
    e.preventDefault();
    let l = document.getElementsByClassName("formations")[0]
    let node = document.createElement("li");
    node.innerText = e.target["nom"].value;
    l.append(node)


    let table = document.getElementsByTagName("tbody")[0];

    let tr = document.createElement("tr");
    let nom = document.createElement("td");
    let vh = document.createElement("td");
    let prix = document.createElement("td");
    let tax = document.createElement("td");
    let ttc = document.createElement("td");

    nom.innerText = e.target["nom"].value;
    nom.style.backgroundColor = " lightgrey";

    vh.innerText = e.target["vh"].value;
    vh.style.backgroundColor = "  lightskyblue";

    prix.innerText = e.target["prix"].value;
    prix.style.backgroundColor = "  lightskyblue";

    tax.innerText = e.target["tax"].value;
    tax.style.backgroundColor = "  lightskyblue";

    ttc.innerText = calculTTC(e.target["prix"].value, e.target["tax"].value)
    ttc.style.backgroundColor = "  lightskyblue";


    tr.append(nom)
    tr.append(vh)
    tr.append(prix)
    tr.append(tax)
    tr.append(ttc)
    table.append(tr);

    document.getElementById("fm").reset();

}
