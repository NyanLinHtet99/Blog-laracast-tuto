import $ from "jquery";
import Chart from "chart.js/auto";

(async function () {
    $.ajax({
        url: "/Getchart",
        type: "get",
        dataType: "json",
        success: function (response) {
            createChart(response);
        },
    });
})();
function createChart(response) {
    const data = response.data;
    data.forEach((row) => {});
    new Chart(document.getElementById("acquisitions"), {
        type: "pie",

        data: {
            labels: data.map((row) => row.category),
            // datasets: [
            //     {
            //         label: "Charts By Category",
            //         data: data.map((row) => row.count),
            //     },
            // ],
            datasets: [
                {
                    label: "Chart By Category",
                    data: data.map((row) => row.count),
                    backgroundColor: data.map((row) => generateRGB()),
                    hoverOffset: 4,
                },
            ],
        },
    });
}
function generateRandom(maxLimit = 255) {
    let rand = Math.random() * maxLimit;
    console.log(rand); // say 99.81321410836433

    rand = Math.floor(rand); // 99

    return rand;
}
function generateRGB() {
    return `rgb(${generateRandom()},${generateRandom()},${generateRandom()})`;
}
