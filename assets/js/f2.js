$(document).ready(() => {

    $.getJSON("formations.html", (data, statusCode) => {

        if (statusCode === "success") {
            for (let i in data) {
                $(".formations").append(`<li>${data[i]["nom"]}</li>`)
                $("tbody").append("<tr> </tr>")
                $("tr").last().append(`<td>${data[i]["nom"]}</td>`)
                $("tr").last().append(`<td>${data[i]["vh"]}</td>`)
                $("tr").last().append(`<td>${data[i]["prix"]}</td>`)
                $("tr").last().append(`<td>${data[i]["tax"]}</td>`)
                let k = (data[i]["prix"] * data[i]["tax"] / 100) + data[i]["prix"]
                $("tr").last().append(`<td>${k}</td>`)
                $(".tableau tr:last:nth-child(n+2)").css("background-color", "lightskyblue")
            }
        } else {
            console.log("error occured while fetching data from formations.html")
        }
    })
    $("#btn1").click((event) => {
        event.preventDefault()

        $.getJSON("formations.html", (data, statusCode) => {

            if (statusCode === "success") {
                $(".formations").html("")
                $("tbody").html("")
                for (let i in data) {
                    $(".formations").append(`<li>${data[i]["nom"]}</li>`)
                    $("tbody").append("<tr> </tr>")
                    $("tr").last().append(`<td>${data[i]["nom"]}</td>`)
                    $("tr").last().append(`<td>${data[i]["vh"]}</td>`)
                    $("tr").last().append(`<td>${data[i]["prix"]}</td>`)
                    $("tr").last().append(`<td>${data[i]["tax"]}</td>`)
                    let k = (data[i]["prix"] * data[i]["tax"] / 100) + data[i]["prix"]
                    $("tr").last().append(`<td>${k}</td>`)
                    $(".tableau tr:last:nth-child(n+2)").css("background-color", "lightskyblue")
                }
            } else {
                console.log("error occured while fetching data from formations.html")
            }
        })
    })

})