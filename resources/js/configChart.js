document.addEventListener('DOMContentLoaded', function () {
    let table = new DataTable('.temps');
});
document.addEventListener('DOMContentLoaded', function () {
    let table = new DataTable('.lamps');
});
const ctx1 = document.getElementById("Chart1").getContext("2d");
const chart1 = new Chart(ctx1, {
    // The type of chart we want to create
    type: "line", // also try bar or other graph types

    // The data for our dataset
    data: {
        labels: [
            "Jan",
            "Fab",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
        ],
        // Information about the dataset
        datasets: [{
                label: "",
                backgroundColor: "transparent",
                borderColor: "#4A6CF7",
                data: [
                    600, 800, 750, 880, 940, 880, 900, 770, 920, 890, 976, 1100,
                ],
                pointBackgroundColor: "transparent",
                pointHoverBackgroundColor: "#4A6CF7",
                pointBorderColor: "transparent",
                pointHoverBorderColor: "#fff",
                pointHoverBorderWidth: 5,
                pointBorderWidth: 5,
                pointRadius: 8,
                pointHoverRadius: 8,
            },
            {
                label: "",
                backgroundColor: "transparent",
                borderColor: "red",
                data: [
                    400, 435, 750, 880, 940, 880, 900, 770, 920, 890, 976, 1100,
                ],
                pointBackgroundColor: "transparent",
                pointHoverBackgroundColor: "#4A6CF7",
                pointBorderColor: "transparent",
                pointHoverBorderColor: "#fff",
                pointHoverBorderWidth: 5,
                pointBorderWidth: 5,
                pointRadius: 8,
                pointHoverRadius: 8,
            },

            {
                label: "",
                backgroundColor: "transparent",
                borderColor: "green",
                data: [
                    300, 435, 750, 880, 940, 880, 900, 770, 920, 890, 976, 800,
                ],
                pointBackgroundColor: "transparent",
                pointHoverBackgroundColor: "#4A6CF7",
                pointBorderColor: "transparent",
                pointHoverBorderColor: "#fff",
                pointHoverBorderWidth: 5,
                pointBorderWidth: 5,
                pointRadius: 8,
                pointHoverRadius: 8,
            },
        ],
    },

    // Configuration options
    defaultFontFamily: "Inter",
    options: {
        tooltips: {
            callbacks: {
                labelColor: function (tooltipItem, chart) {
                    return {
                        backgroundColor: "#ffffff",
                    };
                },
            },
            intersect: false,
            backgroundColor: "#f9f9f9",
            titleFontFamily: "Inter",
            titleFontColor: "#8F92A1",
            titleFontColor: "#8F92A1",
            titleFontSize: 12,
            bodyFontFamily: "Inter",
            bodyFontColor: "#171717",
            bodyFontStyle: "bold",
            bodyFontSize: 16,
            multiKeyBackground: "transparent",
            displayColors: false,
            xPadding: 30,
            yPadding: 10,
            bodyAlign: "center",
            titleAlign: "center",
        },

        title: {
            display: false,
        },
        legend: {
            display: false,
        },

        scales: {
            yAxes: [{
                gridLines: {
                    display: false,
                    drawTicks: true,
                    drawBorder: true,
                },
                ticks: {
                    padding: 35,
                    max: 1200,
                    min: 100,
                },
            }, ],
            xAxes: [{
                gridLines: {
                    drawBorder: false,
                    color: "rgba(143, 146, 161, .1)",
                    zeroLineColor: "rgba(143, 146, 161, .1)",
                },
                ticks: {
                    padding: 20,
                },
            }, ],
        },
    },
});
const ctx2 = document.getElementById("Chart2").getContext("2d");
const chart2 = new Chart(ctx2, {
    // The type of chart we want to create
    type: "line", // also try bar or other graph types

    // The data for our dataset
    data: {
        labels: [
            "Jan",
            "Fab",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",

        ],
        // Information about the dataset
        datasets: [{
                label: "",
                backgroundColor: "transparent",
                borderColor: "#4A6CF7",
                data: [
                    600, 800, 750, 880, 940, 880, 900, 770, 920, 890, 976, 1100,
                ],
                pointBackgroundColor: "transparent",
                pointHoverBackgroundColor: "#4A6CF7",
                pointBorderColor: "transparent",
                pointHoverBorderColor: "#fff",
                pointHoverBorderWidth: 5,
                pointBorderWidth: 5,
                pointRadius: 8,
                pointHoverRadius: 8,
            },
            {
                label: "",
                backgroundColor: "transparent",
                borderColor: "red",
                data: [
                    400, 435, 750, 880, 940, 880, 900, 770, 920, 890, 976, 1100,
                ],
                pointBackgroundColor: "transparent",
                pointHoverBackgroundColor: "#4A6CF7",
                pointBorderColor: "transparent",
                pointHoverBorderColor: "#fff",
                pointHoverBorderWidth: 5,
                pointBorderWidth: 5,
                pointRadius: 8,
                pointHoverRadius: 8,
            },


        ],
    },

    // Configuration options
    defaultFontFamily: "Inter",
    options: {
        tooltips: {
            callbacks: {
                labelColor: function (tooltipItem, chart) {
                    return {
                        backgroundColor: "#ffffff",
                    };
                },
            },
            intersect: false,
            backgroundColor: "#f9f9f9",
            titleFontFamily: "Inter",
            titleFontColor: "#8F92A1",
            titleFontColor: "#8F92A1",
            titleFontSize: 12,
            bodyFontFamily: "Inter",
            bodyFontColor: "#171717",
            bodyFontStyle: "bold",
            bodyFontSize: 16,
            multiKeyBackground: "transparent",
            displayColors: false,
            xPadding: 30,
            yPadding: 10,
            bodyAlign: "center",
            titleAlign: "center",
        },

        title: {
            display: false,
        },
        legend: {
            display: false,
        },

        scales: {
            yAxes: [{
                gridLines: {
                    display: false,
                    drawTicks: true,
                    drawBorder: true,
                },
                ticks: {
                    padding: 35,
                    max: 1200,
                    min: 100,
                },
            }, ],
            xAxes: [{
                gridLines: {
                    drawBorder: false,
                    color: "rgba(143, 146, 161, .1)",
                    zeroLineColor: "rgba(143, 146, 161, .1)",
                },
                ticks: {
                    padding: 20,
                },
            }, ],
        },
    },
});
