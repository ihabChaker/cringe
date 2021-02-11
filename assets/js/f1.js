$(document).ready(() => {
    $("#fm").bind("submit", (e) => {
        e.preventDefault()
        $(".formations").append(`<li>${e.target["nom"].value}</li>`)
        $("tbody").append("<tr> </tr>")
        $("tr").last().append(`<td>${e.target["nom"].value}</td>`)
        $("tr").last().append(`<td>${e.target["vh"].value}</td>`)
        $("tr").last().append(`<td>${e.target["prix"].value}</td>`)
        $("tr").last().append(`<td>${e.target["tax"].value}</td>`)
        let prix = e.target["prix"].value
        let tax = e.target["tax"].value
        let ttc = calculTTC(prix, tax)
        $("tr").last().append(`<td>${ttc}</td>`)
        $(".tableau tr:last:nth-child(n+2)").css("background-color", "lightskyblue")


    })

})
const calculTTC = (prix, tax) => {
    return +(prix * tax / 100) + +prix
}